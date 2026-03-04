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
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Latest news for "Hivi Punde" sidebar (Left)
        $latestNews = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get();

        // 2. Main Featured Post (Center)
        $featuredPost = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first() ?? Content::where('status', 'published')->latest('published_at')->first();

        // 3. Side Grid Posts (Right sidebar)
        $sidePosts = Content::with(['author', 'category'])
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(2)
            ->get();

        // 4. Business Highlight
        $businessPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'BIASHARA')->orWhere('slug', 'biashara')->orWhereHas('parent', function($pq) {
                    $pq->where('name', 'BIASHARA');
                });
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        // 5. Politics / Jiopolitiki
        $politicsPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'JIOPOLITIKI')->orWhere('slug', 'jiopolitiki')->orWhere('name', 'Siasa')
                  ->orWhereHas('parent', function($pq) {
                    $pq->where('name', 'JIOPOLITIKI');
                  });
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get();

        // 6. Uchumi (Economy)
        $economyPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'UCHUMI')->orWhere('slug', 'uchumi')
                  ->orWhereHas('parent', function($pq) {
                    $pq->where('name', 'UCHUMI');
                  });
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get();

        // 7. Masoko (Markets) News
        $marketNews = Content::whereHas('category', function($q) {
                $q->where('name', 'MASOKO')->orWhere('slug', 'masoko')
                  ->orWhereHas('parent', function($pq) {
                    $pq->where('name', 'MASOKO');
                  });
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(5)
            ->get();

        // 8. Lifestyle Posts
        $lifestylePosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Lifestyle');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(1)
            ->first();

        // 9. Mini News & Business Columns
        $newsList = Content::whereHas('category', function($q) {
                $q->where('name', 'World')->orWhere('name', 'Siasa');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        $businessList = Content::whereHas('category', function($q) {
                $q->where('name', 'BIASHARA')->orWhere('slug', 'biashara');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        // 8. Reviews & Recommendations
        $reviewPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Reviews')->orWhere('slug', 'reviews');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        // 9. Technology Insights
        $techInsightPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'TEKNOLOJIA')->orWhere('slug', 'teknolojia');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        // 10. Advisory & Guidance
        $advisoryFeatured = Content::whereHas('category', function($q) {
                $q->where('name', 'Advisory')->orWhere('slug', 'advisory');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $advisoryList = Content::whereHas('category', function($q) {
                $q->where('name', 'Advisory')->orWhere('slug', 'advisory');
            })
            ->where('status', 'published')
            ->where('id', '!=', $advisoryFeatured?->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        // 11. Products
        $products = Product::where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        // 12. Market Prices
        $marketPrices = MarketPrice::with('commodity')
            ->latest('recorded_at')
            ->take(12)
            ->get();

        // 13. Cars (Magari) - Fetch from Content or Products
        $carPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'MAGARI')->orWhere('slug', 'magari');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        $carProducts = Product::where('name', 'like', '%Car%')
            ->orWhere('description', 'like', '%Gari%')
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();

        // 14. Real Estate (Nyumba)
        $housePosts = Content::whereHas('category', function($q) {
                $q->where('name', 'NYUMBA')->orWhere('slug', 'nyumba');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        $houseProducts = Product::where('name', 'like', '%House%')
            ->orWhere('description', 'like', '%Nyumba%')
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();

        return view('website.index', compact(
            'latestNews', 
            'featuredPost', 
            'sidePosts', 
            'businessPosts', 
            'politicsPosts',
            'lifestylePosts',
            'newsList',
            'businessList',
            'reviewPosts',
            'techInsightPosts',
            'advisoryFeatured',
            'advisoryList',
            'products',
            'marketPrices',
            'carPosts',
            'carProducts',
            'housePosts',
            'houseProducts',
            'economyPosts',
            'marketNews'
        ));
    }

    /**
     * Display the specified article.
     */
    /**
     * Display posts for a specific category.
     */
    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $title = strtoupper($category->name);

        $featuredPost = Content::where('category_id', $category->id)
            ->orWhereHas('category', function($q) use ($category) {
                $q->where('parent_id', $category->id);
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::where('category_id', $category->id)
            ->orWhereHas('category', function($q) use ($category) {
                $q->where('parent_id', $category->id);
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->paginate(12);

        return view('website.shared.blog_view', compact('title', 'category', 'featuredPost', 'categoryPosts'));
    }

    public function showArticle($slug)
    {
        $article = Content::with(['author', 'category'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Content::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('website.pages.article_show', compact('article', 'relatedPosts'));
    }
    /**
     * Category Pages
     */
    public function masoko()
    {
        $title = "MASOKO";
        $featuredPost = Content::whereHas('category', function($q) use ($title) {
                $q->where('name', 'Masoko');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) use ($title) {
                $q->where('name', 'Masoko');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function fedha()
    {
        $title = "FEDHA";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Fedha');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Fedha');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function biashara()
    {
        $title = "BIASHARA";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Biashara');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Biashara');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function jiopolitiki()
    {
        $title = "JIOPOLITIKI";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Jiopolitiki');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Jiopolitiki');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function mawasiliano()
    {
        $title = "MAWASILIANO";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Mawasiliano');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Mawasiliano');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function teknolojia()
    {
        $title = "TEKNOLOJIA";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Teknolojia');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Teknolojia');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }

    public function uchumi()
    {
        $title = "UCHUMI";
        $featuredPost = Content::whereHas('category', function($q) {
                $q->where('name', 'Uchumi');
            })
            ->where('status', 'published')
            ->latest('published_at')
            ->first();

        $categoryPosts = Content::whereHas('category', function($q) {
                $q->where('name', 'Uchumi');
            })
            ->where('status', 'published')
            ->where('id', '!=', $featuredPost?->id)
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }
}
