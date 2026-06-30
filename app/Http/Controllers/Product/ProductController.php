<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Models\Setting\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->orderBy('name')
            ->get();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'location'    => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'seller_name' => 'nullable|string|max:255',
            'condition'   => 'nullable|in:new,used,fairly_used',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'      => 'nullable|in:active,inactive',
        ]);

        DB::beginTransaction();
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
            }

            $category = $request->category_id ? Category::find($request->category_id) : null;
            $meta = null;
            if ($category && $category->isVehicleCategory()) {
                $meta = array_filter([
                    'make'         => $request->make,
                    'model'        => $request->vehicle_model,
                    'year'         => $request->year,
                    'mileage'      => $request->mileage,
                    'fuel_type'    => $request->fuel_type,
                    'transmission' => $request->transmission,
                    'color'        => $request->vehicle_color,
                    'body_type'    => $request->body_type,
                    'engine_cc'    => $request->engine_cc,
                ]);
            }

            $product = Product::create([
                'category_id'  => $request->category_id,
                'name'         => $request->name,
                'slug'         => Str::slug($request->name) . '-' . Str::random(5),
                'description'  => $request->description,
                'price'        => $request->price,
                'old_price'    => $request->old_price,
                'rating'       => 0,
                'image'        => $imagePath,
                'location'     => $request->location,
                'phone'        => $request->phone,
                'seller_name'  => $request->seller_name,
                'condition'    => $request->condition ?? 'used',
                'is_featured'  => $request->boolean('is_featured'),
                'meta'         => $meta ?: null,
                'status'       => $request->status ?? 'active',
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $i => $img) {
                    $path = $img->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $i === 0 && !$imagePath,
                        'sort_order' => $i,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.product.index')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Product save failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to save product: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::with('images')->findOrFail($id);
        $categories = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->orderBy('name')
            ->get();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'location'    => 'nullable|string|max:255',
            'phone'       => 'nullable|string|max:20',
            'seller_name' => 'nullable|string|max:255',
            'condition'   => 'nullable|in:new,used,fairly_used',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'      => 'nullable|in:active,inactive',
        ]);

        DB::beginTransaction();
        try {
            $imagePath = $product->image;
            if ($request->hasFile('image')) {
                if ($imagePath && \Storage::disk('public')->exists($imagePath)) {
                    \Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('products', 'public');
            }

            $category = $request->category_id ? Category::find($request->category_id) : null;
            $meta = $product->meta ?? [];
            if ($category && $category->isVehicleCategory()) {
                $meta = array_filter([
                    'make'         => $request->make,
                    'model'        => $request->vehicle_model,
                    'year'         => $request->year,
                    'mileage'      => $request->mileage,
                    'fuel_type'    => $request->fuel_type,
                    'transmission' => $request->transmission,
                    'color'        => $request->vehicle_color,
                    'body_type'    => $request->body_type,
                    'engine_cc'    => $request->engine_cc,
                ]);
            }

            $product->update([
                'category_id'  => $request->category_id,
                'name'         => $request->name,
                'description'  => $request->description,
                'price'        => $request->price,
                'old_price'    => $request->old_price,
                'image'        => $imagePath,
                'location'     => $request->location,
                'phone'        => $request->phone,
                'seller_name'  => $request->seller_name,
                'condition'    => $request->condition ?? $product->condition,
                'is_featured'  => $request->boolean('is_featured'),
                'meta'         => $meta ?: null,
                'status'       => $request->status ?? $product->status,
            ]);

            if ($request->hasFile('images')) {
                $count = $product->images()->count();
                foreach ($request->file('images') as $i => $img) {
                    $path = $img->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => false,
                        'sort_order' => $count + $i,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.product.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Product update failed: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to update product']);
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->image && \Storage::disk('public')->exists($product->image)) {
                \Storage::disk('public')->delete($product->image);
            }
            foreach ($product->images as $img) {
                if (\Storage::disk('public')->exists($img->image_path)) {
                    \Storage::disk('public')->delete($img->image_path);
                }
            }
            $product->delete();
            return redirect()->route('product.product.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Product deletion failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete product']);
        }
    }
}
