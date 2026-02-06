<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imprest\ImprestApproval;
use App\Models\Imprest\Imprest;
use App\Models\Imprest\Retirement;
use App\Models\Imprest\RetirementApproval;
use Auth;


class ImprestApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function application(Request $request)
    {


        $user = $request->user();
        $office = '';

        if($user->can('accountant')){
            $imprests = Imprest::where('status','pending')->get();
            $office = "ACCOUNTANT OFFICE";
        }
        elseif($user->can('hod')){
            $imprests = Imprest::where('status','verified')->get();
            $office = "HEAD OF DEPARTMENT";
        }
        elseif($user->can('acc_officer')){
            $imprests = Imprest::where('status','authorized')->get();
            $office = "ACCOUNTING OFFICER";
        }
        elseif($user->can('cashier')){
            $imprests = Imprest::where('status','approved')->get();
            $office = "CASHIER OFFICE";
        }else{
            $imprests = Imprest::where('status','Nonoo')->get();

        }

        return view('imprest.approvals.application', compact('imprests','office'));   
    }

    public function retirement(Request $request)
    {

        $user = $request->user();
        $imprests = [];
        $office = '';

        if($user->can('hod')){
            $imprests = Retirement::where('status','pending')->get();
            $office = "HEAD OF DEPARTMENT";
        }
        if($user->can('acc_officer')){
            $imprests = Retirement::where('status','authorized')->get();
            $office = "ACCOUNTING OFFICER";
        }
        return view('imprest.approvals.retirement', compact('imprests','office'));   
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$approvalId)
    {

        $request->validate([
            'status' => 'required|in:approved,rejected',
            'comment' => 'required_if:status,rejected|max:500',
        ]);
        
        $approval = ImprestApproval::findOrFail($approvalId);    
        $approval->status = $request->status;
        $approval->comment = $request->comment;
        $approval->action_date = now();
        $approval->user_id = auth()->id(); // who approved
        $approval->save();
        
        $imprest = $approval->imprest; // relationship (not $approval->id)
        
        // If rejected -> whole imprest stops
        if ($request->status === 'rejected') {
            $imprest->update(['status' => 'rejected']);
        } else {
            // Move imprest status based on role_id
            switch ($approval->role_id) {
                case 1: // Accountant
                    $imprest->update(['status' => 'verified']);
                    break;
                case 2: // HOD
                    $imprest->update(['status' => 'authorized']);
                    break;
                case 3: // Accounting Officer
                    $imprest->update(['status' => 'approved']);
                    break;
                case 4: // Cash Office
                    $imprest->update(['status' => 'paid']);
                    break;
            }
        }
        
        return redirect()->back()
            ->with('success', 'Decision recorded successfully.');

    
    }

    /**
     * Display the specified resource.
     */
    public function respond(Request $request, $id)
    {
        $imprest = Imprest::find($id);
        $currentRoleId = $request->user()->roles->first()->id;
        $firstPendingApproval = $imprest->approvals()
            ->where('status', 'pending')
            ->orderBy('id', 'asc')
            ->first();

        // Now check if the logged-in user is the one expected to approve next
        if ($firstPendingApproval && $firstPendingApproval->role_id == $currentRoleId) {
            $canApprove = true;
        } else {
            $canApprove = false;
        }

        $currentApproval = $firstPendingApproval ;

        return view('imprest.approvals.respond', compact('imprest','currentApproval','canApprove'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function retire(Request $request, $id)
    {
        $imprest = Retirement::find($id);

        $currentRoleId = $request->user()->roles->first()->id;
        $firstPendingApproval = $imprest->approvals()
            ->where('status', 'pending')
            ->orderBy('id', 'asc')
            ->first();

        // Now check if the logged-in user is the one expected to approve next
        if ($firstPendingApproval && $firstPendingApproval->role_id == $currentRoleId) {
            $canApprove = true;
        } else {
            $canApprove = false;
        }

        $currentApproval = $firstPendingApproval ;

        return view('imprest.approvals.retire', compact('imprest','currentApproval','canApprove'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'comment' => 'required_if:status,rejected|max:500',
        ]);
        
        $approval = RetirementApproval::findOrFail($id);    
        $approval->status = $request->status;
        $approval->comment = $request->comment;
        $approval->action_date = now();
        $approval->user_id = auth()->id();
        $approval->save();
        
        $imprest = $approval->imprest; // relationship (not $approval->id)
        
        if ($request->status === 'rejected') {
            $imprest->update(['status' => 'rejected']);
        } else {
            switch ($approval->role_id) {
                case 2: // HOD role_id  ==2
                    $imprest->update(['status' => 'authorized']);
                    break;
                case 3: // Accounting Officer role id ==3
                    $imprest->update(['status' => 'verified']);
                    break;
            }
        }
        
        return redirect()->back()
            ->with('success', 'Decision recorded successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
