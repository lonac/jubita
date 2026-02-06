<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('settings.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate input
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 2. Save category
            Category::create([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status'      => 1,
            ]);

            // 3. Commit transaction
            DB::commit();

            return redirect()
                ->route('settings.categories.index')
                ->with('success', 'Category created successfully.');

        } catch (\Exception $e) {

            // 4. Rollback
            DB::rollBack();

            // 5. Log error
            Log::error('Category Store Error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('fail', 'Failed to save category. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
