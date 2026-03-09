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
            ['name' => 'Tsh/GBP', 'min' => 3200, 'max' => 3250],
            ['name' => 'Tsh/EUR', 'min' => 2750, 'max' => 2800],
            ['name' => 'Tsh/KES', 'min' => 18, 'max' => 20],
            ['name' => 'Pamba (Kilo)', 'min' => 1100, 'max' => 1300],
            ['name' => 'Karafuu (Kilo)', 'min' => 14000, 'max' => 16000],
            ['name' => 'Korosho (Kilo)', 'min' => 2000, 'max' => 2500],
            ['name' => 'Sukari (Kilo)', 'min' => 2800, 'max' => 3200],
            ['name' => 'Ngano (Kilo)', 'min' => 1500, 'max' => 1800],
            ['name' => 'Shaba (Tani)', 'min' => 22000000, 'max' => 24000000],
            ['name' => 'Almasi (Carat)', 'min' => 500000, 'max' => 1500000],
            ['name' => 'Petroli (Lita)', 'min' => 3100, 'max' => 3250],
            ['name' => 'Dizeli (Lita)', 'min' => 3000, 'max' => 3150],
            ['name' => 'Gesi ya Kupikia (15kg)', 'min' => 45000, 'max' => 50000],
            ['name' => 'Hisa za NMB', 'min' => 4500, 'max' => 4800],
            ['name' => 'Hisa za CRDB', 'min' => 500, 'max' => 550],
            ['name' => 'Hisa za TBL', 'min' => 10000, 'max' => 11000],
            ['name' => 'Hisa za VODA', 'min' => 700, 'max' => 750],
            ['name' => 'Hisa za Twiga Cement', 'min' => 4000, 'max' => 4200],
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
