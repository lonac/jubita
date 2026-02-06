<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\ExpenseCategory;


class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ExpenseCategory::all();

        return view('settings.expense_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Define the validation rules
         $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:expense_categories',
        ]);


        try {
  
            $expense_categorie = new ExpenseCategory();
            $expense_categorie->name = $validatedData['name']; 
            $expense_categorie->save();

            return redirect()->route('settings.expense_category.index')->with('success', 'Expense category registered successfully!');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while saving the Expense category. Please try again.'])
                         ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
