<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Imprest\Imprest;
use App\Models\Imprest\Retirement;
use App\Models\Imprest\RetirementExpense;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use DB;
use PDF; 


class RetirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $imprests = Retirement::where('user_id',$request->user()->id)->get();
    
        return view('imprest.retirements.index', compact('imprests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $imprest = Imprest::find(1);
        //$imprest->update(['status'=>'paid']);

  
        $imprests = Imprest::where('user_id',$request->user()->id)->where('status','paid')->get();

        return view('imprest.retirements.create', compact('imprests'));
    }


    public function getDetails($id)
    {
        $imprest = Imprest::findOrFail($id);
        return response()->json([
            'approved_amount' => $imprest->total_requested_amount,
            'start_date'      => $imprest->start_date,
            'end_date'        => $imprest->end_date,
            'purpose'         => $imprest->purpose,
            'destination'     => $imprest->safari_destination,
            'per_diem'=> ($imprest->subsistence_rate   * $imprest->total_nights),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'imprest_id'         => 'required|exists:imprests,id',
            'expenses.*.name'    => 'required|string|max:50',
            'expenses.*.rate'    => 'nullable|numeric|min:0',
            'expenses.*.receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'comment'            => 'nullable|string|max:500',
        ]);


        DB::beginTransaction();

        try {
            $imprest = Imprest::findOrFail($validated['imprest_id']);
            $issuedAmount = $imprest->total_requested_amount;

            $totalRetired = 0;

            // 1️⃣ Create retirement record
            $retirement = Retirement::create([
                'imprest_id'           => $imprest->id,
                'user_id'              => Auth::id(),
                'date'                 => now(),
                'total_retired_amount' => 0, // update later
                'balance_to_return'    => 0,
                'excess_expenditure'   => 0,
                'status'               => 'pending',
                'comment'              => $request->comment,
            ]);

            // 2️⃣ Save expenses
            if ($request->has('expenses')) {
                foreach ($request->expenses as $exp) {
                    $receiptPath = null;
                    if (isset($exp['receipt'])) {
                      //  if ($request->hasFile($exp['receipt'])) {
                        if (isset($exp['receipt']) && $exp['receipt'] instanceof \Illuminate\Http\UploadedFile) {                            
                            $filename = time() . '_' . uniqid() . '.' . $exp['receipt']->getClientOriginalExtension();
                            $exp['receipt']->move(public_path('retirement/receipts'), $filename);
                            $receiptPath = 'retirement/receipts/' . $filename;
                        }
                    }

                    $expense = RetirementExpense::create([
                        'retirement_id' => $retirement->id,
                        'quantity'      => 1,
                        'amount'        => 1 * $exp['rate'],
                        'rate'        => $exp['rate'],
                        'name'        => $exp['name'],
                        'receipt_path'  => $receiptPath,
                    ]);

                    $totalRetired += $expense->amount;
                }
            }

            // 3️⃣ Compute balances
            $balanceToReturn  = 0;
            $excessExpenditure = 0;

            if ($totalRetired < $issuedAmount) {
                $balanceToReturn = $issuedAmount - $totalRetired;
            } elseif ($totalRetired > $issuedAmount) {
                $excessExpenditure = $totalRetired - $issuedAmount;
            }

            // 4️⃣ Update retirement record
            $retirement->update([
                'total_retired_amount' => $totalRetired,
                'balance_to_return'    => $balanceToReturn,
                'excess_expenditure'   => $excessExpenditure,
            ]);

            // 5️⃣ Update imprest status
            $imprest->update([
                'retirement_status' => 1,
                'status'            => 'retired',
            ]);

              //Initiate Approval
              $workflowRoles = [2, 3]; // role_ids in order, 1==account, 2==hod, 3==acc officer, 4==cashier
              foreach ($workflowRoles as $roleId) {
                  $retirement->approvals()->create([
                      'role_id' => $roleId,
                      'status'  => 'pending',
                  ]);
              }

            DB::commit();

            return redirect()->route('imprest.retirement.index')
                ->with('success', "Imprest retired successfully. Spent: {$totalRetired}, Balance to return: {$balanceToReturn}, Excess claim: {$excessExpenditure}");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(['fail' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $imprest = Retirement::find($id);
        if(($imprest->user_id==$request->user()->id)){
            return view('imprest.retirements.show', compact('imprest'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $retirement = Retirement::find($id);
        if(($retirement->user_id==$request->user()->id) && ($retirement->status=="pending")){
            $imprests = Imprest::where('user_id',$request->user()->id)->where('status','retired')->get();
            return view('imprest.retirements.edit', compact('retirement','imprests'));
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'expenses.*.name'     => 'required|string|max:50',
            'expenses.*.quantity' => 'required|numeric|min:0',
            'expenses.*.rate'     => 'nullable|numeric|min:0',
            'expenses.*.receipt'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'comment'             => 'nullable|string|max:500',
        ]);
    
        DB::beginTransaction();
    
        try {
            // 1️⃣ Find retirement
            $retirement = Retirement::findOrFail($id);
            $imprest    = $retirement->imprest;
            $issuedAmount = $imprest->total_requested_amount;
    
            $totalRetired = 0;
    
            // 2️⃣ Update retirement comment (before expenses)
            $retirement->update([
                'comment' => $request->comment,
            ]);
    
            // 3️⃣ Clear old expenses (simplest approach)
            $retirement->expenses()->delete();
    
            // 4️⃣ Insert updated expenses
            if ($request->has('expenses')) {
                foreach ($request->expenses as $exp) {
                    $receiptPath = null;
    
                    if (isset($exp['receipt']) && $exp['receipt'] instanceof \Illuminate\Http\UploadedFile) {
                        $filename = time() . '_' . uniqid() . '.' . $exp['receipt']->getClientOriginalExtension();
                        $exp['receipt']->move(public_path('retirement/receipts'), $filename);
                        $receiptPath = 'retirement/receipts/' . $filename;
                    }
    
                    $expense = RetirementExpense::create([
                        'retirement_id' => $retirement->id,
                        'name'          => $exp['name'],
                        'quantity'      => $exp['quantity'],
                        'rate'          => $exp['rate'],
                        'amount'        => ($exp['quantity'] * $exp['rate']),
                        'receipt_path'  => $receiptPath,
                    ]);
    
                    $totalRetired += $expense->amount;
                }
            }

    
            // Compute balances
            $balanceToReturn   = 0;
            $excessExpenditure = 0;
    
            if ($totalRetired < $issuedAmount) {
                $balanceToReturn = $issuedAmount - $totalRetired;
            } elseif ($totalRetired > $issuedAmount) {
                $excessExpenditure = $totalRetired - $issuedAmount;
            }

    
            // Update retirement record with totals
            $retirement->update([
                'total_retired_amount' => $totalRetired,
                'balance_to_return'    => $balanceToReturn,
                'excess_expenditure'   => $excessExpenditure,
            ]);
    
            // 7️⃣ (Optional) keep imprest updated
            $imprest->update([
                'retirement_status' => 1,
                'status'            => 'retired',
            ]);
    
            DB::commit();
    
            return redirect()->route('imprest.retirement.index')
                ->with('success', "Retirement updated successfully. Spent: {$totalRetired}, Balance: {$balanceToReturn}, Excess: {$excessExpenditure}");
    
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['fail' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function download(Request $request, $id)
    {
        
        $retirement = Retirement::with('imprest.user.department')->findOrFail($id);

        $imprest = $retirement->imprest;

        if($imprest->imprest_type_id==1){
            $title = "SAFARI IMPREST";
            $state = true;
        }else{
            $title = "STANDING IMPREST";
            $state = false;
        }

        $staff    = $imprest->user;

        $pdf = Pdf::loadView('imprest.retirements.app_pdf', compact('retirement', 'imprest', 'staff','title','state'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('retirement_form_'.$retirement->id.'.pdf');



    }
}
