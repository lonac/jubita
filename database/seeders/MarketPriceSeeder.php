<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\CommodityType;
use App\Models\Market\MarketPrice;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MarketPriceSeeder extends Seeder
{
    public function run(): void
    {
        $commodities = [
            ['name' => 'Mahindi (Kilo)', 'min' => 800, 'max' => 1200],
            ['name' => 'Mpunga (Kilo)', 'min' => 1200, 'max' => 1500],
            ['name' => 'Kahawa (Arabica)', 'min' => 5500, 'max' => 7000],
            ['name' => 'Dhahabu (Gramu 24K)', 'min' => 165000, 'max' => 180000],
            ['name' => 'Mafuta ya Alizeti (Lita)', 'min' => 3500, 'max' => 4500],
            ['name' => 'Tsh/USD', 'min' => 2530, 'max' => 2580],
        ];

        foreach ($commodities as $c) {
            $type = CommodityType::updateOrCreate(
                ['slug' => Str::slug($c['name'])],
                ['name' => $c['name'], 'status' => 1]
            );

            MarketPrice::create([
                'commodity_type_id' => $type->id,
                'price_min' => $c['min'],
                'price_max' => $c['max'],
                'market_type' => 'update',
                'recorded_at' => Carbon::now(),
            ]);
        }
    }
}
