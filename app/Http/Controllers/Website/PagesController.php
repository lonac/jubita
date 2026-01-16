<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function masoko()
    {
        $title = "MASOKO";
        return view('website.shared.blog_view',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function biashara()
    {
        $title = "BIASHARA";
        return view('website.shared.blog_view',compact('title'));
    }

    /**
     * Display the specified resource.
     */
    public function jiopolitiki()
    {
        $title = "JIOPOLITIKI";
        return view('website.shared.blog_view',compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function mawasiliano()
    {
        $title = "MAWASILIANO";
        return view('website.shared.blog_view',compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function teknolojia()
    {
        $title = "TEKNOLOJIA";
        return view('website.shared.blog_view',compact('title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function uchumi()
    {
        $title = "UCHUMI";
        return view('website.shared.blog_view',compact('title'));
    }
}
