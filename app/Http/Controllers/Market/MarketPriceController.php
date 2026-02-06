<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\MarketPrice;
use App\Models\Setting\CommodityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketPriceController extends Controller
{
    public function index()
    {
        $prices = MarketPrice::with('commodity')
            ->latest()
            ->paginate(20);

        return view('market_prices.index', compact('prices'));
    }

    public function create()
    {
        $commodities = CommodityType::orderBy('name')->get();
        return view('market_prices.create', compact('commodities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'commodity_id' => 'required|exists:commodity_types,id',
            'price_min'    => 'required|numeric|min:0',
            'price_max'    => 'required|numeric|min:0|gte:price_min',
            'market_type'  => 'nullable|in:trending,hot_offer,update',
        ]);


        DB::beginTransaction();

        try {
            MarketPrice::create([
                'commodity_type_id' => $request->commodity_id,
                'price_min'    => $request->price_min,
                'price_max'    => $request->price_max,
                'market_type'  => $request->market_type ?? 'update',
                'recorded_at'  => $request->recorded_at ?? now(),
            ]);

            DB::commit();

            return redirect()
                ->route('market.market_price.index')
                ->with('success', 'Market price recorded successfully');

        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Market price save failed: ' . $e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to save market price']);
        }
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
