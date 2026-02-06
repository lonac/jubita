<?php

namespace App\Http\Controllers\Configure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\CommodityType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommodityTypeController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CommodityType::all();

        return view('settings.commodity_type.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.commodity_type.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate input
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:commodity_types,name',
            'description' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // 2. Save category
            CommodityType::create([
                'name'        => $validated['name'],
                'description' => $validated['description'] ?? null,
                'slug'        => $request->slug ?? Str::slug($request->name),
                'status'      => 1,
            ]);

            // 3. Commit transaction
            DB::commit();

            return redirect()
                ->route('settings.commodity_type.index')
                ->with('success', 'CommodityType created successfully.');

        } catch (\Exception $e) {

            // 4. Rollback
            DB::rollBack();

            dd($e);

            // 5. Log error
            Log::error('CommodityType Store Error: ' . $e->getMessage());

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
