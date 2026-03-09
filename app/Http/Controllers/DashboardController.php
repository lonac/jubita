<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member\Member;
use App\Models\Loan\Loan;
use App\Models\User;
use App\Models\Imprest\Imprest;
use App\Models\Imprest\Retirement;
use App\Models\Imprest\RetirementExpense;
use App\Models\Content\Content;
use App\Models\Setting\Category;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $totalPosts = Content::count();
        $publishedPosts = Content::where('status', 'published')->count();
        $pendingPosts = Content::where('status', 'draft')->count();
        $totalCategories = Category::count();

        return view('dashboard', compact('user', 'totalPosts', 'publishedPosts', 'pendingPosts', 'totalCategories'));
    }
}
