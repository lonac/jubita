<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


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
        $parent_categories = Category::all();
        return view('settings.categories.create', compact('parent_categories'));
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
            'parent_id'   => 'nullable|exists:categories,id',
        ]);

        DB::beginTransaction();

        try {
            // 2. Save category
            Category::create([
                'name'        => $validated['name'],
                'slug'        => Str::slug($validated['name']),
                'description' => $validated['description'] ?? null,
                'parent_id'   => $validated['parent_id'] ?? null,
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
        $category = Category::findOrFail($id);
        return view('settings.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parent_categories = Category::where('id', '!=', $id)->get();
        return view('settings.categories.edit', compact('category', 'parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string|max:255',
            'parent_id'   => 'nullable|exists:categories,id',
            'status'      => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $category->update([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'parent_id'   => $validated['parent_id'] ?? null,
                'status'      => $validated['status'],
            ]);

            DB::commit();

            return redirect()
                ->route('settings.categories.index')
                ->with('success', 'Category updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category Update Error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('fail', 'Failed to update category. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()
                ->route('settings.categories.index')
                ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Category Delete Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('fail', 'Failed to delete category.');
        }
    }
}
