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
    public function index()
    {
        $categories = Category::with('parent')->orderBy('category_type')->orderBy('name')->get();
        return view('settings.categories.index', compact('categories'));
    }

    public function create()
    {
        $parent_categories = Category::whereNull('parent_id')->get();
        return view('settings.categories.create', compact('parent_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name',
            'description'   => 'nullable|string|max:255',
            'parent_id'     => 'nullable|exists:categories,id',
            'category_type' => 'required|in:news,product,both',
            'icon'          => 'nullable|string|max:100',
            'color'         => 'nullable|string|max:20',
            'is_main'       => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            Category::create([
                'name'          => $validated['name'],
                'slug'          => Str::slug($validated['name']),
                'description'   => $validated['description'] ?? null,
                'parent_id'     => $validated['parent_id'] ?? null,
                'category_type' => $validated['category_type'],
                'icon'          => $validated['icon'] ?? null,
                'color'         => $validated['color'] ?? null,
                'is_main'       => $request->boolean('is_main'),
                'status'        => 1,
            ]);
            DB::commit();
            return redirect()->route('settings.categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category Store Error: ' . $e->getMessage());
            return back()->with('fail', 'Failed to save category. Please try again.');
        }
    }

    public function show(string $id)
    {
        $category = Category::with('children', 'products')->findOrFail($id);
        return view('settings.categories.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parent_categories = Category::whereNull('parent_id')->where('id', '!=', $id)->get();
        return view('settings.categories.edit', compact('category', 'parent_categories'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name,' . $id,
            'description'   => 'nullable|string|max:255',
            'parent_id'     => 'nullable|exists:categories,id',
            'status'        => 'required|boolean',
            'category_type' => 'required|in:news,product,both',
            'icon'          => 'nullable|string|max:100',
            'color'         => 'nullable|string|max:20',
            'is_main'       => 'nullable|boolean',
        ]);

        DB::beginTransaction();
        try {
            $category->update([
                'name'          => $validated['name'],
                'description'   => $validated['description'] ?? null,
                'parent_id'     => $validated['parent_id'] ?? null,
                'status'        => $validated['status'],
                'category_type' => $validated['category_type'],
                'icon'          => $validated['icon'] ?? null,
                'color'         => $validated['color'] ?? null,
                'is_main'       => $request->boolean('is_main'),
            ]);
            DB::commit();
            return redirect()->route('settings.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Category Update Error: ' . $e->getMessage());
            return back()->with('fail', 'Failed to update category. Please try again.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->route('settings.categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Category Delete Error: ' . $e->getMessage());
            return back()->with('fail', 'Failed to delete category.');
        }
    }
}
