<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Setting\Category;

class MarketplaceController extends Controller
{
    /**
     * Marketplace homepage — all product listings.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q'         => 'nullable|string|max:100',
            'cat'       => 'nullable|string|max:100',
            'condition' => 'nullable|in:new,used,fairly_used',
            'location'  => 'nullable|string|max:100',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
        ]);

        $categories = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->whereNull('parent_id')
            ->withCount('products')
            ->get();

        $query = Product::with('category')
            ->where('status', 'active')
            ->latest();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(fn ($qb) =>
                $qb->where('name', 'like', "%{$q}%")
                   ->orWhere('description', 'like', "%{$q}%")
                   ->orWhere('location', 'like', "%{$q}%")
            );
        }

        if ($request->filled('cat')) {
            $cat = Category::where('slug', $request->cat)->first();
            if ($cat) {
                $childIds = $cat->children->pluck('id')->toArray();
                $query->whereIn('category_id', array_merge([$cat->id], $childIds));
            }
        }

        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products  = $query->paginate(16)->withQueryString();
        $featured  = Product::with('category')->where('status', 'active')->where('is_featured', true)->latest()->take(4)->get();
        $locations = Product::where('status', 'active')->whereNotNull('location')->distinct()->orderBy('location')->pluck('location');

        return view('website.marketplace.index', compact('products', 'categories', 'featured', 'locations'));
    }

    /**
     * Category-filtered listing.
     */
    public function byCategory(Request $request, string $slug)
    {
        $request->validate([
            'q'           => 'nullable|string|max:100',
            'condition'   => 'nullable|in:new,used,fairly_used',
            'location'    => 'nullable|string|max:100',
            'min_price'   => 'nullable|numeric|min:0',
            'max_price'   => 'nullable|numeric|min:0',
            'make'        => 'nullable|string|max:100',
            'year_min'    => 'nullable|integer|min:1900|max:2100',
            'year_max'    => 'nullable|integer|min:1900|max:2100',
            'fuel_type'   => 'nullable|string|max:50',
            'transmission'=> 'nullable|string|max:50',
        ]);

        $category = Category::where('slug', $slug)->firstOrFail();
        $childIds = $category->children->pluck('id')->toArray();

        $query = Product::with('category')
            ->where('status', 'active')
            ->whereIn('category_id', array_merge([$category->id], $childIds))
            ->latest();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(fn ($qb) => $qb->where('name', 'like', "%{$q}%")->orWhere('description', 'like', "%{$q}%"));
        }
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($category->isVehicleCategory()) {
            if ($request->filled('make')) {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.make')) = ?", [$request->make]);
            }
            if ($request->filled('year_min')) {
                $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, '$.year')) AS UNSIGNED) >= ?", [(int) $request->year_min]);
            }
            if ($request->filled('year_max')) {
                $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, '$.year')) AS UNSIGNED) <= ?", [(int) $request->year_max]);
            }
            if ($request->filled('fuel_type')) {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.fuel_type')) = ?", [$request->fuel_type]);
            }
            if ($request->filled('transmission')) {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.transmission')) = ?", [$request->transmission]);
            }
        }

        $products  = $query->paginate(16)->withQueryString();
        $locations = Product::where('status', 'active')
            ->whereIn('category_id', array_merge([$category->id], $childIds))
            ->whereNotNull('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return view('website.marketplace.category', compact('category', 'products', 'locations'));
    }

    /**
     * Product detail page.
     */
    public function show(string $slug)
    {
        $product = Product::with('category', 'images')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $product->incrementViews();

        $related = Product::with('category')
            ->where('status', 'active')
            ->where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                if ($product->category_id) {
                    $q->where('category_id', $product->category_id);
                }
                if ($product->location) {
                    $q->orWhere('location', $product->location);
                }
            })
            ->latest()
            ->take(6)
            ->get();

        return view('website.marketplace.show', compact('product', 'related'));
    }

    /**
     * Dedicated vehicles/magari page.
     */
    public function vehicles(Request $request)
    {
        $request->validate([
            'make'        => 'nullable|string|max:100',
            'year_min'    => 'nullable|integer|min:1900|max:2100',
            'year_max'    => 'nullable|integer|min:1900|max:2100',
            'fuel_type'   => 'nullable|string|max:50',
            'transmission'=> 'nullable|string|max:50',
            'min_price'   => 'nullable|numeric|min:0',
            'max_price'   => 'nullable|numeric|min:0',
            'location'    => 'nullable|string|max:100',
        ]);

        // Fetch vehicle category IDs in DB — avoids loading all categories into PHP
        $catIds = Category::where('status', 1)
            ->whereIn('category_type', ['product', 'both'])
            ->where(function ($q) {
                $q->where('name', 'like', '%gari%')
                  ->orWhere('name', 'like', '%car%')
                  ->orWhere('name', 'like', '%vehicle%')
                  ->orWhere('slug', 'like', '%gari%')
                  ->orWhere('slug', 'like', '%car%')
                  ->orWhere('slug', 'like', '%vehicle%');
            })
            ->pluck('id')
            ->toArray();

        $vehicleCategories = Category::whereIn('id', $catIds)->get();

        $query = Product::with('category')
            ->where('status', 'active')
            ->whereIn('category_id', $catIds)
            ->latest();

        if ($request->filled('make')) {
            $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.make')) = ?", [$request->make]);
        }
        if ($request->filled('year_min')) {
            $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, '$.year')) AS UNSIGNED) >= ?", [(int) $request->year_min]);
        }
        if ($request->filled('year_max')) {
            $query->whereRaw("CAST(JSON_UNQUOTE(JSON_EXTRACT(meta, '$.year')) AS UNSIGNED) <= ?", [(int) $request->year_max]);
        }
        if ($request->filled('fuel_type')) {
            $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.fuel_type')) = ?", [$request->fuel_type]);
        }
        if ($request->filled('transmission')) {
            $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.transmission')) = ?", [$request->transmission]);
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $vehicles = $query->paginate(12)->withQueryString();

        // Get distinct makes from JSON — only select the meta column
        $makes = Product::whereIn('category_id', $catIds)
            ->where('status', 'active')
            ->whereNotNull('meta')
            ->select('meta')
            ->get()
            ->map(fn ($p) => data_get($p->meta, 'make'))
            ->filter()
            ->unique()
            ->sort()
            ->values();

        $locations = Product::whereIn('category_id', $catIds)
            ->where('status', 'active')
            ->whereNotNull('location')
            ->distinct()
            ->orderBy('location')
            ->pluck('location');

        return view('website.marketplace.vehicles', compact('vehicles', 'makes', 'locations', 'vehicleCategories'));
    }
}
