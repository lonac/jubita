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
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:products,slug,' . $id,
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'nullable|in:active,inactive',
        ]);

        DB::beginTransaction();

        try {
            $imagePath = $product->image;
            if ($request->hasFile('image')) {
                // Delete old image
                if ($imagePath && \Storage::disk('public')->exists($imagePath)) {
                    \Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('products', 'public');
            }

            $product->update([
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
                ->with('success', 'Product updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Product update failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to update product']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
            $product->delete();

            return redirect()->route('product.product.index')
                ->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Product deletion failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete product']);
        }
    }
}
