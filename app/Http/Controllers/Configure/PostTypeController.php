<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\PostType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostType::all();

        return view('settings.post_type.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.post_type.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate input
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:post_types,name',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 2. Create post type
            PostType::create([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status'      => 1,
            ]);

            // 3. Commit transaction
            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Post type created successfully.');

        } catch (\Exception $e) {

            // 4. Rollback on error
            DB::rollBack();

            // 5. Log error for debugging
            Log::error('PostType Store Error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('fail', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = PostType::findOrFail($id);
        return view('settings.post_type.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = PostType::findOrFail($id);
        return view('settings.post_type.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = PostType::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:post_types,name,' . $id,
            'description' => 'nullable|string|max:255',
            'status'      => 'required|boolean',
        ]);

        DB::beginTransaction();

        try {
            $category->update([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'status'      => $validated['status'],
            ]);

            DB::commit();

            return redirect()
                ->route('settings.post_type.index')
                ->with('success', 'Post type updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('PostType Update Error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('fail', 'Failed to update post type.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = PostType::findOrFail($id);
            $category->delete();

            return redirect()
                ->route('settings.post_type.index')
                ->with('success', 'Post type deleted successfully.');
        } catch (\Exception $e) {
            Log::error('PostType Delete Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('fail', 'Failed to delete post type.');
        }
    }
}
