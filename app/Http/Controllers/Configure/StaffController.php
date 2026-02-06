<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting\Occupation;
use App\Models\Setting\SalaryScale;
use App\Models\Setting\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;



class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::all();
        return view('settings.staff.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        if($request->user()->can('configure')){
        $roles = Role::all();
        $occupations = Occupation::all();
        $departments = Department::all();
        $salary_scales = SalaryScale::all();

    
        return view('settings.staff.create',compact('roles','occupations','departments','salary_scales'));
        }

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define the validation rules
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:Male,Female',
            'role' => 'required|exists:roles,id', 
            'department_id' => 'required|exists:departments,id',
            'salary_scale_id' => 'required|exists:salary_scales,id', 
            'occupation_id' => 'required|exists:occupations,id',   
            'profile_photo' => 'nullable|image|max:2048', 
            'check_no' => 'required|unique:users',   
        ]);


        try {
            $profilePhotoPath = null;
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('public/profile_photos');
            }
            $email = strtolower($validatedData['first_name']).strtolower($validatedData['last_name'])."@imprest.com";
            $staff = new User();
            $staff->first_name = $validatedData['first_name'];
            $staff->middle_name = $validatedData['middle_name'] ?? null;
            $staff->last_name = $validatedData['last_name'];
            $staff->email = $email;
            $staff->phone_number = $validatedData['phone_number'] ?? null;
            $staff->date_of_birth = $validatedData['date_of_birth'] ?? null;
            $staff->gender = $validatedData['gender'];
            $staff->department_id = $validatedData['department_id'];
            $staff->salary_scale_id = $validatedData['salary_scale_id'];
            $staff->occupation_id = $validatedData['occupation_id'];
            $staff->check_no = $validatedData['check_no'];
            $staff->profile_photo = $profilePhotoPath;
            $staff->password = Hash::make('1234');
            $staff->status = true; 
            $staff->save();

            //Attach role for new staff
            $staff_role = Role::find($request->role);
            $staff->roles()->attach($staff_role);



            return redirect()->route('settings.staff.index')->with('success', 'Staff registered successfully!');

        } catch (\Exception $e) {
            return back()->with(['fail' => 'An error occurred while saving the staff. Please try again.'])
                         ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        if($request->user()->can('configure')){
            $staff = User::find($id);        
                return view('settings.staff.show',compact('staff'));
            }

            return redirect('/');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        if($request->user()->can('configure')){
            $roles = Role::all();
            $staff = User::find($id);
            $occupations = Occupation::all();
            $departments = Department::all();
            $salary_scales = SalaryScale::all();
    
        
            return view('settings.staff.edit',compact('roles','occupations','departments','salary_scales','staff'));
            }
    
            return redirect('/');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);


        // 1️⃣ Validation
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:Male,Female',
            'role' => 'required|exists:roles,id', 
            'department_id' => 'required|exists:departments,id',
             'salary_scale_id' => 'required|exists:salary_scales,id', 
             'occupation_id' => 'required|exists:occupations,id',   
             'profile_photo' => 'nullable|image|max:2048', 
             'check_no' => 'required|unique:users,check_no,' . $user->id,   
        ]);


        try {
            // 2️⃣ Handle profile photo update
            if ($request->hasFile('profile_photo')) {
                $profilePhotoPath = $request->file('profile_photo')->store('public/profile_photos');
                $user->profile_photo = $profilePhotoPath;
            }

            // 3️⃣ Update user fields
            $user->first_name = $validatedData['first_name'];
            $user->middle_name = $validatedData['middle_name'] ?? null;
            $user->last_name = $validatedData['last_name'];
            $user->phone_number = $validatedData['phone_number'] ?? null;
            $user->date_of_birth = $validatedData['date_of_birth'] ?? null;
            $user->gender = $validatedData['gender'];
            $user->department_id = $validatedData['department_id'];
            $user->salary_scale_id = $validatedData['salary_scale_id'];
            $user->occupation_id = $validatedData['occupation_id'];
            $user->check_no = $validatedData['check_no'];
            $user->status = $request->has('status') ? (bool)$request->status : $user->status;

            $user->save();

            // 4️⃣ Sync role (only one role per staff)
            $user->roles()->sync([$request->role]);

            return redirect()->route('settings.staff.index')
                ->with('success', 'Staff updated successfully!');

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'An error occurred while updating the staff. ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $staff = User::find($id);
            $staff->delete();

            return redirect()->route('settings.staff.index')->with('success','Staff deleted successfully');
            
        } catch (Exception $e) {
            
            return redirect()->back()->with('fail','Failed to delete Staff'.$e->getMessage());

        }

    }
}
