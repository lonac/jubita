<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'nullable|in:active,inactive',
        ]);



        DB::beginTransaction();

        try {
            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
            }

            Product::create([
                'name'        => $request->name,
                'slug'        => $request->slug ?? Str::slug($request->name),
                'description' => $request->description,
                'price'       => $request->price,
                'old_price'   => $request->old_price,
                'rating'      => $request->rating ?? 0,
                'image'       => $imagePath,
                'status'      => $request->status ?? 'active',
            ]);

            DB::commit();

            return redirect()->route('product.product.index')
                ->with('success', 'Product added successfully');

        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Product save failed: ' . $e->getMessage());

            return back()->withInput()
                ->withErrors(['error' => 'Failed to save product']);
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
