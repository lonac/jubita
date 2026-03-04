<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\Content;

class FedhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            ->paginate(12);

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }
}
