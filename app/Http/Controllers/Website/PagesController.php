<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\Content;
use App\Models\Setting\Category;
use App\Models\Product\Product;
use App\Models\Market\MarketPrice;

class PagesController extends Controller
{
    /**
     * Homepage
     */
    public function index()
    {
        // Helper: build a content query for a category by slug or name
        $byCat = fn (string ...$slugs) => fn ($q) =>
            $q->whereIn('slug', $slugs)->orWhereIn('name', array_map('strtoupper', $slugs));

        // 1. Latest news sidebar
        $latestNews = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->latest('published_at')
            ->take(10)
            ->get();

        // 2. Featured post
        $featuredPost = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first()
            ?? Content::with(['author', 'category'])
                ->where('status', 'published')
                ->latest('published_at')
                ->first();

        // 3. Side grid (exclude featured)
        $sidePosts = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->when($featuredPost, fn ($q) => $q->where('id', '!=', $featuredPost->id))
            ->latest('published_at')
            ->take(4)
            ->get();

        // 4. Jiopolitiki
        $politicsPosts = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('jiopolitiki', 'siasa'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(12)
            ->get();

        // 5. Uchumi
        $economyPosts = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('uchumi'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(8)
            ->get();

        // 6. Masoko news
        $marketNews = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('masoko'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(9)
            ->get();

        // 7. Teknolojia
        $techInsightPosts = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('teknolojia'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(12)
            ->get();

        // 8. Biashara
        $businessList = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('biashara'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(12)
            ->get();

        $businessPosts = $businessList->first();

        // 9. Advisory
        $advisoryFeatured = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('advisory'))
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $advisoryList = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('advisory'))
            ->where('status', 'published')
            ->when($advisoryFeatured, fn ($q) => $q->where('id', '!=', $advisoryFeatured->id))
            ->latest('published_at')
            ->take(8)
            ->get();

        // 10. Reviews
        $reviewPosts = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('reviews'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(8)
            ->get();

        // 11. Other lists
        $lifestylePosts = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('lifestyle'))
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $newsList = Content::with(['author', 'category'])
            ->whereHas('category', $byCat('world', 'siasa'))
            ->where('status', 'published')
            ->latest('published_at')
            ->take(8)
            ->get();

        // 12. Market prices ticker
        $marketPrices = MarketPrice::with('commodity')
            ->latest('recorded_at')
            ->take(30)
            ->get();

        // 13. Product categories for homepage
        $productCategories = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->whereNull('parent_id')
            ->withCount('products')
            ->orderByDesc('products_count')
            ->take(8)
            ->get();

        // 14. Featured listings
        $featuredProducts = Product::with('category')
            ->where('status', 'active')
            ->where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();

        // 15. Latest listings
        $latestProducts = Product::with('category')
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();

        // 16. Car products — filter in DB (matches isVehicleCategory() logic)
        $vehicleCatIds = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->where(function ($q) {
                $q->where('name', 'like', '%gari%')
                  ->orWhere('name', 'like', '%car%')
                  ->orWhere('name', 'like', '%vehicle%')
                  ->orWhere('slug', 'like', '%gari%')
                  ->orWhere('slug', 'like', '%car%')
                  ->orWhere('slug', 'like', '%vehicle%');
            })
            ->pluck('id')
            ->toArray();

        $carProducts = Product::with('category')
            ->where('status', 'active')
            ->when(!empty($vehicleCatIds), fn ($q) => $q->whereIn('category_id', $vehicleCatIds))
            ->latest()
            ->take(4)
            ->get();

        // 17. House products
        $houseProducts = Product::with('category')
            ->where('status', 'active')
            ->whereHas('category', fn ($q) =>
                $q->where('slug', 'like', '%nyumba%')
                  ->orWhere('name', 'like', '%nyumba%')
                  ->orWhere('name', 'like', '%house%')
            )
            ->take(4)
            ->get();

        $products = $latestProducts;
        $carPosts = collect();
        $housePosts = collect();

        return view('website.index', compact(
            'latestNews', 'featuredPost', 'sidePosts',
            'businessPosts', 'politicsPosts', 'lifestylePosts',
            'newsList', 'businessList', 'reviewPosts',
            'techInsightPosts', 'advisoryFeatured', 'advisoryList',
            'products', 'marketPrices', 'carProducts',
            'carPosts', 'houseProducts', 'housePosts',
            'economyPosts', 'marketNews', 'productCategories',
            'featuredProducts', 'latestProducts'
        ));
    }

    /**
     * Category listing page
     */
    public function showCategory(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $title    = strtoupper($category->name);

        $featuredPost = Content::with(['author', 'category'])
            ->where(function ($q) use ($category) {
                $q->where('category_id', $category->id)
                  ->orWhereHas('category', fn ($sq) => $sq->where('parent_id', $category->id));
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::with(['author', 'category'])
            ->where(function ($q) use ($category) {
                $q->where('category_id', $category->id)
                  ->orWhereHas('category', fn ($sq) => $sq->where('parent_id', $category->id));
            })
            ->where('status', 'published')
            ->when($featuredPost, fn ($q) => $q->where('id', '!=', $featuredPost->id))
            ->latest('published_at')
            ->paginate(12);

        return view('website.shared.blog_view', compact('title', 'category', 'featuredPost', 'categoryPosts'));
    }

    /**
     * Single article page
     */
    public function showArticle(string $slug)
    {
        $article = Content::with(['author', 'category'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Content::with(['author', 'category'])
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('website.pages.article_show', compact('article', 'relatedPosts'));
    }

    /**
     * Category-specific pages (shared pattern)
     */
    private function categoryPage(string $title, string $slug)
    {
        $featuredPost = Content::with(['author', 'category'])
            ->whereHas('category', fn ($q) => $q->where('slug', $slug)->orWhere('name', ucfirst($slug)))
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::with(['author', 'category'])
            ->whereHas('category', fn ($q) => $q->where('slug', $slug)->orWhere('name', ucfirst($slug)))
            ->where('status', 'published')
            ->when($featuredPost, fn ($q) => $q->where('id', '!=', $featuredPost->id))
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function masoko()      { return $this->categoryPage('MASOKO', 'masoko'); }
    public function fedha()       { return $this->categoryPage('FEDHA', 'fedha'); }
    public function biashara()    { return $this->categoryPage('BIASHARA', 'biashara'); }
    public function jiopolitiki() { return $this->categoryPage('JIOPOLITIKI', 'jiopolitiki'); }
    public function mawasiliano() { return $this->categoryPage('MAWASILIANO', 'mawasiliano'); }
    public function teknolojia()  { return $this->categoryPage('TEKNOLOJIA', 'teknolojia'); }
    public function uchumi()      { return $this->categoryPage('UCHUMI', 'uchumi'); }

    /**
     * Market prices page
     */
    public function marketPrices(Request $request)
    {
        $request->validate([
            'q'      => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'type'   => 'nullable|in:trending,hot_offer,update',
        ]);

        $prices = MarketPrice::with('commodity')
            ->when($request->q, fn ($q) =>
                $q->whereHas('commodity', fn ($cq) => $cq->where('name', 'like', '%' . $request->q . '%'))
            )
            ->when($request->region, fn ($q) =>
                $q->where('location', 'like', '%' . $request->region . '%')
            )
            ->when($request->type, fn ($q) =>
                $q->where('market_type', $request->type)
            )
            ->latest('recorded_at')
            ->paginate(48);

        return view('website.pages.market_prices', compact('prices'));
    }
}
