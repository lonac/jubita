<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use Illuminate\Http\Request;
use App\Models\Setting\PostType;
use App\Models\Setting\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $contents = Content::all();

       return view('contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postTypes = PostType::all();
        $categories = Category::all();
        $authors = User::all(); 
        return view('contents.create', compact('postTypes','categories','authors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:contents,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'post_type_id' => 'required|exists:post_types,id',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 2. Start transaction
        DB::beginTransaction();

        try {
            // 3. Handle featured image upload if exists
            $imagePath = null;
            if ($request->hasFile('featured_image')) {
                $imagePath = $request->file('featured_image')->store('contents', 'public');
            }

            // 4. Set slug if not provided
            $slug = $request->slug ?: Str::slug($request->title);

            // 5. Create Content
            $content = Content::create([
                'title' => $request->title,
                'slug' => $slug,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'post_type_id' => $request->post_type_id,
                'category_id' => $request->category_id,
                'author_id' => Auth::id(), // logged in user
                'featured_image' => $imagePath,
                'status' => $request->status ?? 'draft',
            ]);

            // 6. Commit transaction
            DB::commit();

            return redirect()->route('content.content.index')->with('success', 'Content created successfully.');

        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Log error for debugging (optional)
            \Log::error('Content creation failed: ' . $e->getMessage());

            return back()->withInput()->withErrors(['error' => 'Failed to create content. Please try again.']);
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
