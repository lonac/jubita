<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Market\MarketPrice;
use App\Models\Setting\CommodityType;
use Carbon\Carbon;

class MarketPriceSeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // COMMODITY TYPES — Real Tanzanian commodities
        // =========================================================
        $commodities = [
            // Food staples
            ['name' => 'Mahindi (Kibichi)',       'slug' => 'mahindi-kibichi',    'description' => 'Mahindi mapya kutoka shambani'],
            ['name' => 'Mahindi (Kavu)',           'slug' => 'mahindi-kavu',       'description' => 'Mahindi makavu tayari kupika'],
            ['name' => 'Mchele (Supa)',            'slug' => 'mchele-supa',        'description' => 'Mchele mweupe wa hali ya juu'],
            ['name' => 'Mchele (Sindano)',         'slug' => 'mchele-sindano',     'description' => 'Mchele mrefu wa aina ya sindano'],
            ['name' => 'Maharage (Nyekundu)',      'slug' => 'maharage-nyekundu',  'description' => 'Maharage nyekundu ya Tanzania'],
            ['name' => 'Maharage (Njano)',         'slug' => 'maharage-njano',     'description' => 'Maharage ya njano'],
            ['name' => 'Unga wa Ngano (2kg)',      'slug' => 'unga-ngano-2kg',     'description' => 'Unga wa ngano pakiti ya 2 kilo'],
            ['name' => 'Unga wa Mahindi (2kg)',    'slug' => 'unga-mahindi-2kg',   'description' => 'Unga wa mahindi (sembe) pakiti 2kg'],
            ['name' => 'Sukari (Nyeupe)',          'slug' => 'sukari-nyeupe',      'description' => 'Sukari nyeupe ya kilo moja'],
            ['name' => 'Mafuta ya Kupikia (1L)',   'slug' => 'mafuta-kupikia-1l',  'description' => 'Mafuta ya kupikia lita moja'],
            ['name' => 'Chumvi',                   'slug' => 'chumvi',             'description' => 'Chumvi ya chakula kilo moja'],
            // Vegetables & fruits
            ['name' => 'Nyanya',                   'slug' => 'nyanya',             'description' => 'Nyanya za ndani kwa kilo'],
            ['name' => 'Vitunguu Maji',            'slug' => 'vitunguu-maji',      'description' => 'Vitunguu maji kwa kilo'],
            ['name' => 'Ndizi (Mzigo)',            'slug' => 'ndizi-mzigo',        'description' => 'Ndizi mzigo mmoja (takriban 30 mikono)'],
            ['name' => 'Viazi Mviringo',           'slug' => 'viazi-mviringo',     'description' => 'Viazi mviringo kwa kilo'],
            ['name' => 'Muhogo (Kibichi)',          'slug' => 'muhogo-kibichi',     'description' => 'Muhogo mbichi kwa kilo'],
            ['name' => 'Kabichi',                  'slug' => 'kabichi',            'description' => 'Kabichi moja'],
            ['name' => 'Karoti',                   'slug' => 'karoti',             'description' => 'Karoti kwa kilo'],
            // Protein
            ['name' => 'Nyama ya Ng\'ombe (1kg)', 'slug' => 'nyama-ng-ombe',     'description' => 'Nyama ya ng\'ombe kwa kilo'],
            ['name' => 'Nyama ya Kuku (1kg)',     'slug' => 'nyama-kuku',        'description' => 'Nyama ya kuku kwa kilo'],
            ['name' => 'Samaki (Dagaa, 1kg)',     'slug' => 'samaki-dagaa',      'description' => 'Dagaa kwa kilo'],
            ['name' => 'Samaki (Sato, 1kg)',      'slug' => 'samaki-sato',       'description' => 'Sato (Tilapia) kwa kilo'],
            ['name' => 'Mayai (Karatasi 30)',     'slug' => 'mayai-karatasi',    'description' => 'Mayai karatasi ya 30'],
            // Cash crops
            ['name' => 'Kahawa (Grade A)',        'slug' => 'kahawa-grade-a',    'description' => 'Kahawa daraja la kwanza kwa kilo'],
            ['name' => 'Chai (Majani, 1kg)',      'slug' => 'chai-majani',       'description' => 'Majani ya chai kwa kilo'],
            ['name' => 'Pamba (Kibichi, 1kg)',    'slug' => 'pamba-kibichi',     'description' => 'Pamba mbichi kwa kilo'],
            ['name' => 'Korosho (Ganda, 1kg)',   'slug' => 'korosho-ganda',     'description' => 'Korosho na maganda kwa kilo'],
            ['name' => 'Ufuta (1kg)',             'slug' => 'ufuta',             'description' => 'Ufuta kwa kilo'],
            // Fuel
            ['name' => 'Mafuta ya Petroli (1L)', 'slug' => 'petroli-lita',      'description' => 'Bei ya petroli kwa lita moja'],
            ['name' => 'Mafuta ya Dizeli (1L)',  'slug' => 'dizeli-lita',       'description' => 'Bei ya dizeli kwa lita moja'],
            ['name' => 'Gesi ya Kupikia (15kg)', 'slug' => 'gesi-kupikia-15kg', 'description' => 'Silinda ya gesi ya kupikia 15kg'],
            // Metals & currency
            ['name' => 'Dhahabu (1 gramu)',      'slug' => 'dhahabu-gramu',     'description' => 'Bei ya dhahabu kwa gramu moja DSM'],
            ['name' => 'Dola ya Marekani (USD)', 'slug' => 'usd-tzs',           'description' => 'Kiwango cha ubadilishaji USD/TZS'],
            ['name' => 'Euro (EUR)',              'slug' => 'eur-tzs',           'description' => 'Kiwango cha ubadilishaji EUR/TZS'],
            ['name' => 'Shilingi ya Kenya (KES)','slug' => 'kes-tzs',           'description' => 'Kiwango cha ubadilishaji KES/TZS'],
        ];

        foreach ($commodities as $item) {
            CommodityType::updateOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, ['status' => 1])
            );
        }

        // =========================================================
        // MARKET PRICES — Realistic 2025 Tanzanian prices
        // Key markets: Kariakoo, Tandale, Arusha, Moshi, Mwanza, Dodoma
        // =========================================================
        $today = Carbon::today()->toDateString();

        $priceData = [
            // ---- MAHINDI ----
            ['slug' => 'mahindi-kavu',      'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 600,     'max' => 900,     'type' => 'update'],
            ['slug' => 'mahindi-kavu',      'location' => 'Tandale - Dar es Salaam',  'unit' => 'kg',         'min' => 550,     'max' => 850,     'type' => 'update'],
            ['slug' => 'mahindi-kavu',      'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 500,     'max' => 750,     'type' => 'update'],
            ['slug' => 'mahindi-kavu',      'location' => 'Dodoma Mjini',             'unit' => 'kg',         'min' => 480,     'max' => 700,     'type' => 'update'],
            // ---- MCHELE ----
            ['slug' => 'mchele-supa',       'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 2800,    'max' => 3500,    'type' => 'update'],
            ['slug' => 'mchele-supa',       'location' => 'Tandale - Dar es Salaam',  'unit' => 'kg',         'min' => 2600,    'max' => 3200,    'type' => 'update'],
            ['slug' => 'mchele-sindano',    'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 3200,    'max' => 4000,    'type' => 'trending'],
            ['slug' => 'mchele-sindano',    'location' => 'Mwanza Mjini',             'unit' => 'kg',         'min' => 3000,    'max' => 3800,    'type' => 'trending'],
            // ---- MAHARAGE ----
            ['slug' => 'maharage-nyekundu', 'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 3000,    'max' => 4500,    'type' => 'trending'],
            ['slug' => 'maharage-nyekundu', 'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 2800,    'max' => 4000,    'type' => 'update'],
            ['slug' => 'maharage-njano',    'location' => 'Moshi Mjini',              'unit' => 'kg',         'min' => 2500,    'max' => 3800,    'type' => 'update'],
            // ---- UNGA ----
            ['slug' => 'unga-ngano-2kg',    'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'paket (2kg)', 'min' => 5500,   'max' => 7000,    'type' => 'update'],
            ['slug' => 'unga-ngano-2kg',    'location' => 'Mwanza Mjini',             'unit' => 'paket (2kg)', 'min' => 5800,   'max' => 7200,    'type' => 'update'],
            ['slug' => 'unga-mahindi-2kg',  'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'paket (2kg)', 'min' => 3500,   'max' => 4500,    'type' => 'update'],
            // ---- SUKARI ----
            ['slug' => 'sukari-nyeupe',     'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 3500,    'max' => 5000,    'type' => 'trending'],
            ['slug' => 'sukari-nyeupe',     'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 3800,    'max' => 5200,    'type' => 'trending'],
            ['slug' => 'sukari-nyeupe',     'location' => 'Mbeya Mjini',              'unit' => 'kg',         'min' => 3200,    'max' => 4800,    'type' => 'update'],
            // ---- MAFUTA YA KUPIKIA ----
            ['slug' => 'mafuta-kupikia-1l', 'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'lita',       'min' => 7000,    'max' => 9500,    'type' => 'update'],
            ['slug' => 'mafuta-kupikia-1l', 'location' => 'Tandale - Dar es Salaam',  'unit' => 'lita',       'min' => 6800,    'max' => 9000,    'type' => 'update'],
            // ---- NYANYA ----
            ['slug' => 'nyanya',            'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 1000,    'max' => 2500,    'type' => 'update'],
            ['slug' => 'nyanya',            'location' => 'Mwananyamala - Dar es Salaam', 'unit' => 'kg',     'min' => 800,     'max' => 2200,    'type' => 'update'],
            ['slug' => 'nyanya',            'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 600,     'max' => 1500,    'type' => 'hot_offer'],
            // ---- VITUNGUU ----
            ['slug' => 'vitunguu-maji',     'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 1500,    'max' => 3000,    'type' => 'update'],
            ['slug' => 'vitunguu-maji',     'location' => 'Dodoma Mjini',             'unit' => 'kg',         'min' => 1200,    'max' => 2500,    'type' => 'update'],
            // ---- NDIZI ----
            ['slug' => 'ndizi-mzigo',       'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'mzigo',      'min' => 8000,    'max' => 20000,   'type' => 'update'],
            ['slug' => 'ndizi-mzigo',       'location' => 'Moshi Mjini',              'unit' => 'mzigo',      'min' => 5000,    'max' => 12000,   'type' => 'hot_offer'],
            // ---- NYAMA ----
            ['slug' => 'nyama-ng-ombe',     'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 15000,   'max' => 22000,   'type' => 'trending'],
            ['slug' => 'nyama-ng-ombe',     'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 14000,   'max' => 20000,   'type' => 'update'],
            ['slug' => 'nyama-kuku',        'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'kg',         'min' => 8000,    'max' => 12000,   'type' => 'update'],
            ['slug' => 'samaki-dagaa',      'location' => 'Kivukoni - Dar es Salaam', 'unit' => 'kg',         'min' => 3500,    'max' => 7000,    'type' => 'update'],
            ['slug' => 'samaki-sato',       'location' => 'Mwanza Mjini',             'unit' => 'kg',         'min' => 4000,    'max' => 8000,    'type' => 'hot_offer'],
            ['slug' => 'mayai-karatasi',    'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'karata (30)', 'min' => 12000,  'max' => 16000,   'type' => 'update'],
            // ---- MAZAO YA BIASHARA ----
            ['slug' => 'kahawa-grade-a',    'location' => 'Arusha Mjini',             'unit' => 'kg',         'min' => 8000,    'max' => 12000,   'type' => 'trending'],
            ['slug' => 'kahawa-grade-a',    'location' => 'Moshi Mjini',              'unit' => 'kg',         'min' => 7500,    'max' => 11000,   'type' => 'trending'],
            ['slug' => 'chai-majani',       'location' => 'Iringa Mjini',             'unit' => 'kg',         'min' => 2500,    'max' => 4500,    'type' => 'update'],
            ['slug' => 'pamba-kibichi',     'location' => 'Shinyanga Mjini',          'unit' => 'kg',         'min' => 1400,    'max' => 2200,    'type' => 'update'],
            ['slug' => 'korosho-ganda',     'location' => 'Mtwara Mjini',             'unit' => 'kg',         'min' => 3000,    'max' => 5500,    'type' => 'trending'],
            ['slug' => 'ufuta',             'location' => 'Dodoma Mjini',             'unit' => 'kg',         'min' => 4000,    'max' => 7000,    'type' => 'update'],
            // ---- MAFUTA YA GARI ----
            ['slug' => 'petroli-lita',      'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'lita',       'min' => 2900,    'max' => 3200,    'type' => 'update'],
            ['slug' => 'petroli-lita',      'location' => 'Arusha Mjini',             'unit' => 'lita',       'min' => 2950,    'max' => 3250,    'type' => 'update'],
            ['slug' => 'petroli-lita',      'location' => 'Mwanza Mjini',             'unit' => 'lita',       'min' => 3100,    'max' => 3400,    'type' => 'update'],
            ['slug' => 'dizeli-lita',       'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'lita',       'min' => 2700,    'max' => 3000,    'type' => 'update'],
            ['slug' => 'dizeli-lita',       'location' => 'Dodoma Mjini',             'unit' => 'lita',       'min' => 2800,    'max' => 3100,    'type' => 'update'],
            ['slug' => 'gesi-kupikia-15kg', 'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'silinda (15kg)', 'min' => 52000, 'max' => 60000, 'type' => 'trending'],
            // ---- DHAHABU & FEDHA ----
            ['slug' => 'dhahabu-gramu',     'location' => 'Kariakoo - Dar es Salaam', 'unit' => 'gramu',      'min' => 270000,  'max' => 285000,  'type' => 'trending'],
            // ---- SARAFU ZA KIGENI ----
            ['slug' => 'usd-tzs',           'location' => 'Kariakoo - Dar es Salaam', 'unit' => '1 USD',      'min' => 2555,    'max' => 2575,    'type' => 'update'],
            ['slug' => 'eur-tzs',           'location' => 'Kariakoo - Dar es Salaam', 'unit' => '1 EUR',      'min' => 2750,    'max' => 2800,    'type' => 'update'],
            ['slug' => 'kes-tzs',           'location' => 'Kariakoo - Dar es Salaam', 'unit' => '100 KES',    'min' => 1950,    'max' => 2050,    'type' => 'update'],
        ];

        foreach ($priceData as $row) {
            $commodity = CommodityType::where('slug', $row['slug'])->first();
            if (!$commodity) continue;

            MarketPrice::create([
                'commodity_type_id' => $commodity->id,
                'location'          => $row['location'],
                'unit'              => $row['unit'],
                'price_min'         => $row['min'],
                'price_max'         => $row['max'],
                'market_type'       => $row['type'],
                'recorded_at'       => $today,
            ]);
        }
    }
}
