<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member\Member;
use App\Models\Loan\Loan;
use App\Models\User;
use App\Models\Imprest\Imprest;
use App\Models\Imprest\Retirement;
use App\Models\Imprest\RetirementExpense;
use Auth;
use PDF; 
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportsExport;
class ReportController extends Controller
{
  /**
     * Show report dashboard (filter + preview).
     */
    public function index(Request $request)
    {
        $query = Imprest::with(['user','retirement']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('created_at', [$request->from, $request->to]);
        }

        $reports = $query->latest()->paginate(10);

        return view('report.index', compact('reports'));
    }

    /**
     * Export reports (Excel / PDF).
     */
    public function export(Request $request)
    {
        $format = $request->get('format', 'excel');
        $query = Imprest::with(['user','retirement'])->latest();
        $reports = $query->get();

        if ($format === 'excel') {
            return Excel::download(new ReportsExport($reports), 'imprest_report.xlsx');
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('report.pdf', compact('reports'));
            return $pdf->download('imprest_report.pdf');
        }

        return back()->with('FAIL','Invalid format selected');
    }

    /**
     * Print-friendly report.
     */
    public function print(Request $request)
    {
        $query = Imprest::with(['user','retirement'])->latest();
        $reports = $query->get();

        return view('report.print', compact('reports'));
    }
}
