<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use App\Models\Setting\Category;
use App\Models\Product\Product;
use App\Models\Content\Content;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share nav data with all website views — cached to avoid DB hits on every request
        View::composer('website.*', function ($view) {

            // Main nav categories (with children for mega menu) — cache 10 min
            $menuCategories = Cache::remember('menu_categories', 600, fn () =>
                Category::with(['children' => fn ($q) => $q->where('status', 1)->orderBy('name')])
                    ->where('is_main', 1)
                    ->whereNull('parent_id')
                    ->where('status', 1)
                    ->orderBy('name')
                    ->get()
            );

            // Pre-load latest 4 articles per menu category in ONE query — cache 5 min
            $menuCategoryArticles = Cache::remember('menu_cat_articles', 300, function () use ($menuCategories) {
                $catIds   = $menuCategories->pluck('id')->toArray();
                $childIds = $menuCategories->flatMap(fn ($c) => $c->children->pluck('id'))->toArray();

                $all = Content::whereIn('category_id', array_merge($catIds, $childIds))
                    ->where('status', 'published')
                    ->latest('published_at')
                    ->take(60)
                    ->get();

                $result = [];
                foreach ($menuCategories as $cat) {
                    $ids = array_merge([$cat->id], $cat->children->pluck('id')->toArray());
                    $result[$cat->id] = $all->whereIn('category_id', $ids)->take(4)->values();
                }
                return $result;
            });

            // Marketplace mega menu categories — cache 10 min
            $navProductCategories = Cache::remember('nav_product_cats', 600, fn () =>
                Category::where('status', 1)
                    ->whereIn('category_type', ['product', 'both'])
                    ->whereNull('parent_id')
                    ->take(7)
                    ->get()
            );

            // Featured products for marketplace mega menu — cache 5 min
            $navFeaturedProducts = Cache::remember('nav_featured_products', 300, fn () =>
                Product::with('category')
                    ->where('status', 'active')
                    ->where('is_featured', true)
                    ->latest()
                    ->take(4)
                    ->get()
            );

            $view->with(compact(
                'menuCategories',
                'menuCategoryArticles',
                'navProductCategories',
                'navFeaturedProducts'
            ));
        });

        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
        }

        Blade::directive('role', function ($role) {
            return "if(auth()->check() && auth()->user()->hasRole({$role})) :";
        });

        Blade::directive('endrole', function () {
            return "endif;";
        });
    }
}
