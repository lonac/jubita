<?php

namespace App\Http\Controllers\Imprest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Imprest\Imprest;
use App\Models\Setting\ImprestType;
use App\Models\Setting\Allowance;
use App\Models\Setting\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use DB;
use PDF; 



class ImprestController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $imprests = Imprest::where('user_id',$request->user()->id)->get();
    
        return view('imprest.imprest.index', compact('imprests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $imprestTypes = ImprestType::all();

        $unretired_imprest = Imprest::where('user_id',$request->user()->id)->where('status','paid')->first();

        if($unretired_imprest){
            return redirect()->back()
            ->with('fail', 'You have a unretired Imprest. Process retirement first before new application!');    
        }

    
        return view('imprest.imprest.create', compact('imprestTypes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::beginTransaction();

        try {
            // 1️⃣ Validate request
            $validated = $request->validate([ 
                'imprest_type_id'    => 'required|exists:imprest_types,id',
                'start_date'         => 'required_if:imprest_type_id,1|nullable|date',
                'end_date'           => 'required_if:imprest_type_id,1|nullable|date|after_or_equal:start_date',
                'safari_destination' => 'required_if:imprest_type_id,1|nullable|string|max:255',
                'purpose'            => 'required|string|max:255',
                'imprest_amount'     => 'required|numeric|min:0',
                'expenses.*.name'    => 'nullable|string|max:255',
                'expenses.*.quantity'  => 'nullable|integer|min:1',
                'expenses.*.rate'  => 'nullable|numeric|min:0',
            ]);
    
            $user = Auth::user();
    
            // 2️⃣ Calculate total nights
            $totalNights = 0;

            if (!empty($validated['start_date']) && !empty($validated['end_date'])) {
                $startDate = Carbon::parse($validated['start_date']);
                $endDate   = Carbon::parse($validated['end_date']);
                $totalNights = $startDate->diffInDays($endDate);
            }
      
    
            // 3️⃣ Get allowance and subsistence rate
            $salaryScale = $user->salary_scale ?? 'TGS A';
            $allowance   = Allowance::where('salary_scale_id', $user->salary_scale_id ?? 1)->first();
            $subsistenceRate = $allowance->amount ?? 0;
    
            $totalRequested = $totalNights * $subsistenceRate;

            $totalRequested = $request->imprest_amount;
    
            // 4️⃣ Get user role
            $userRole = DB::table('users_roles')->where('user_id', $user->id)->first();
    
            // 5️⃣ Create Imprest
            $imprest = Imprest::create([
                'date'                  => now(),
                'user_id'               => $user->id,
                'imprest_type_id'       => $validated['imprest_type_id'],
                'department_id'         => $user->department_id ?? 1,
                'designation_id'        => $user->designation_id ?? 1,
                'role_id'               => $userRole->role_id ?? null,
                'allowance_id'          => $allowance->id ?? null,
                'salary_scale'          => $salaryScale,
                'subsistence_rate'      => $subsistenceRate,
                'start_date'            => $validated['start_date'] ?? null,
                'end_date'              => $validated['end_date'] ?? null,
                'purpose'               => $validated['purpose'],
                'safari_destination'    => $validated['safari_destination'] ?? null,
                'total_nights'          => $totalNights,
                'total_requested_amount'=> $totalRequested,
            ]);
    
            // 6️⃣ Save incidental expenses
            $incidentalCost = 0;

            if ($request->has('expenses')) {
                foreach ($request->expenses as $exp) {
                    if (!empty($exp['name']) && !empty($exp['rate'])) {
                        $amount = 1 * $exp['rate'];
                        $incidentalCost += $amount;
                        $imprest->expenses()->create([
                            'name'   => $exp['name'],
                            'quantity'   => 1,
                            'rate'   => $exp['rate'],
                            'amount' => $amount,
                        ]);
                    }
                }
            }
    
            // 7️⃣ Update total requested amount
            // $imprest->update([
            //     'total_requested_amount' => $totalRequested,
            //     // 'total_requested_amount' => $totalRequested + $incidentalCost
            // ]);

            //Initiate Approval
            $workflowRoles = [1, 2, 3, 4]; // role_ids in order, 1==account, 2==hod, 3==acc officer, 4==cashier
                foreach ($workflowRoles as $roleId) {
                    $imprest->approvals()->create([
                        'role_id' => $roleId,
                        'status'  => 'pending',
                    ]);
                }
    
            DB::commit();
    
            return redirect()->route('imprest.imprest.index')
                ->with('success', 'Imprest Application submitted successfully!');
    
        } catch (\Exception $e) {

            DB::rollBack();
            \Log::error('Imprest Store Error: ' . $e->getMessage());
            return redirect()->route('imprest.imprest.index')
                ->with('fail', 'Something went wrong while submitting your Imprest. Please try again later!');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $imprest = Imprest::find($id);
        if(($imprest->user_id==$request->user()->id)){
            return view('imprest.imprest.show', compact('imprest'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $imprest = Imprest::find($id);
        if(($imprest->user_id==$request->user()->id) && ($imprest->status=="pending")){
            $imprestTypes = ImprestType::all();
            return view('imprest.imprest.edit', compact('imprest','imprestTypes'));
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imprest $imprest)
    {
        DB::beginTransaction();

        try {
            // 1️⃣ Validate
            $validated = $request->validate([
                'imprest_type_id'    => 'required|exists:imprest_types,id',
                'start_date'         => 'required_if:imprest_type_id,1|nullable|date',
                'end_date'           => 'required_if:imprest_type_id,1|nullable|date|after_or_equal:start_date',
                'safari_destination' => 'required_if:imprest_type_id,1|nullable|string|max:255',
                'purpose'            => 'required|string|max:255',
                'imprest_amount'     => 'required|numeric|min:0',
                'expenses.*.name'    => 'nullable|string|max:255',
                'expenses.*.rate'  => 'nullable|numeric|min:0',
            ]);

            $user = Auth::user();

            // 2️⃣ Recalculate total nights and requested amount
            $startDate = Carbon::parse($validated['start_date']);
            $endDate   = Carbon::parse($validated['end_date']);
            $totalNights = $startDate->diffInDays($endDate);

            $salaryScale = $user->salary_scale ?? 'TGS A';
            $allowance   = Allowance::where('salary_scale_id', $user->salary_scale_id ?? 1)->first();
            $subsistenceRate = $allowance->amount ?? 0;

           // $totalRequested = $totalNights * $subsistenceRate;

           $totalRequested  = $request->imprest_amount; 
            

            // 3️⃣ Update Imprest main data
            $imprest->update([
                'imprest_type_id'       => $validated['imprest_type_id'],
                'department_id'         => $user->department_id ?? $imprest->department_id,
                'designation_id'        => $user->designation_id ?? $imprest->designation_id,
                'salary_scale'          => $salaryScale,
                'subsistence_rate'      => $subsistenceRate,
                'start_date'            => $validated['start_date'],
                'end_date'              => $validated['end_date'],
                'purpose'               => $validated['purpose'],
                'safari_destination'    => $validated['safari_destination'],
                'total_nights'          => $totalNights,
                'total_requested_amount'=> $totalRequested, // Will add expenses next
            ]);

            // 4️⃣ Handle incidental expenses
            $incidentalCost = 0;

            // Delete all existing expenses and re-add (simpler for dynamic form)
            $imprest->expenses()->delete();

            if ($request->has('expenses')) {
                foreach ($request->expenses as $exp) {
                    if (!empty($exp['name']) && !empty($exp['rate'])) {
                        $amount = 1 * $exp['rate'];
                        $incidentalCost += $amount;
                        $imprest->expenses()->create([
                            'name'   => $exp['name'],
                            'quantity'   => 1,
                            'rate'   => $exp['rate'],
                            'amount' => $amount,
                        ]);
                    }
                }
            }

            // if ($request->has('expenses')) {
            //     foreach ($request->expenses as $exp) {
            //         if (!empty($exp['name']) && !empty($exp['amount'])) {
            //             $incidentalCost += $exp['amount'];
            //             $imprest->expenses()->create([
            //                 'name'   => $exp['name'],
            //                 'amount' => $exp['amount'],
            //             ]);
            //         }
            //     }
            // }

            // 5️⃣ Update total requested with incidental expenses
            // $imprest->update([
            //     'total_requested_amount' => $totalRequested + $incidentalCost
            // ]);

            DB::commit();

            return redirect()->route('imprest.imprest.index')
                ->with('success', 'Imprest Application updated successfully!');

        } catch (\Exception $e) {

            dd($e);
            DB::rollBack();
            \Log::error('Imprest Update Error: ' . $e->getMessage());
            return redirect()->route('imprest.imprest.index')
                ->with('fail', 'Something went wrong while updating your Imprest. Please try again later!');
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
        $imprest = Imprest::find($id);


        if($imprest->imprest_type_id==1){
            $title = "SAFARI IMPREST";
            $state = true;
        }else{
            $title = "STANDING IMPREST";
            $state = false;
        }

        $pdf = PDF::loadView('imprest.app_pdf', compact('imprest','title','state'));
        return $pdf->download('imprest_application.pdf');

    }
}
