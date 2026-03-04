<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\Content;

class MawasilianoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            ->paginate(12);

        return view('website.shared.blog_view', compact('title', 'featuredPost', 'categoryPosts'));
    }
}
