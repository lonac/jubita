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
            ->latest('recorded_at')
            ->paginate(25);

        return view('market_prices.index', compact('prices'));
    }

    public function create()
    {
        $commodities = CommodityType::where('status', 1)->orderBy('name')->get();
        return view('market_prices.create', compact('commodities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'commodity_id' => 'required|exists:commodity_types,id',
            'location'     => 'nullable|string|max:100',
            'unit'         => 'nullable|string|max:30',
            'price_min'    => 'required|numeric|min:0',
            'price_max'    => 'required|numeric|min:0|gte:price_min',
            'market_type'  => 'nullable|in:trending,hot_offer,update',
            'recorded_at'  => 'nullable|date',
        ]);

        DB::transaction(function () use ($request) {
            MarketPrice::create([
                'commodity_type_id' => $request->commodity_id,
                'location'          => $request->location,
                'unit'              => $request->unit,
                'price_min'         => $request->price_min,
                'price_max'         => $request->price_max,
                'market_type'       => $request->market_type ?? 'update',
                'recorded_at'       => $request->recorded_at ?? now()->toDateString(),
            ]);
        });

        return redirect()->route('market.market_price.index')
            ->with('success', 'Bei imeongezwa.');
    }

    public function edit(MarketPrice $market_price)
    {
        $commodities = CommodityType::where('status', 1)->orderBy('name')->get();
        return view('market_prices.edit', compact('market_price', 'commodities'));
    }

    public function update(Request $request, MarketPrice $market_price)
    {
        $request->validate([
            'commodity_id' => 'required|exists:commodity_types,id',
            'location'     => 'nullable|string|max:100',
            'unit'         => 'nullable|string|max:30',
            'price_min'    => 'required|numeric|min:0',
            'price_max'    => 'required|numeric|min:0|gte:price_min',
            'market_type'  => 'nullable|in:trending,hot_offer,update',
            'recorded_at'  => 'nullable|date',
        ]);

        DB::transaction(function () use ($request, $market_price) {
            $market_price->update([
                'commodity_type_id' => $request->commodity_id,
                'location'          => $request->location,
                'unit'              => $request->unit,
                'price_min'         => $request->price_min,
                'price_max'         => $request->price_max,
                'market_type'       => $request->market_type ?? 'update',
                'recorded_at'       => $request->recorded_at ?? now()->toDateString(),
            ]);
        });

        return redirect()->route('market.market_price.index')
            ->with('success', 'Bei imesasishwa.');
    }

    public function destroy(MarketPrice $market_price)
    {
        $market_price->delete();
        return redirect()->route('market.market_price.index')
            ->with('success', 'Bei imefutwa.');
    }
}
