<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member\Member;
use App\Models\Loan\Loan;
use App\Models\User;
use App\Models\Imprest\Imprest;
use App\Models\Imprest\Retirement;
use App\Models\Imprest\RetirementExpense;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard');
        
    }
}
