<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // CARS
            [
                'name' => 'Toyota RAV4 (Year 2018) - Imported',
                'price' => 75000000,
                'old_price' => 85000000,
                'description' => 'Gari nzuri ya kisasa, imetumika nje tu (Duty paid). Inapatikana Showroom Dar es Salaam.',
                'image' => 'https://images.unsplash.com/photo-1542362567-b058c023d1f2?q=80&w=800',
            ],
            [
                'name' => 'Toyota IST (New Model) - Silver',
                'price' => 22000000,
                'old_price' => 25000000,
                'description' => 'Gari ndogo inayookoa mafuta, rangi ya silver, kilometa chache.',
                'image' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?q=80&w=800',
            ],
            // HOUSES
            [
                'name' => 'Modern 4-Bedroom House in Masaki',
                'price' => 1200000000, // 1.2B
                'old_price' => 1400000000,
                'description' => 'Nyumba ya kifahari yenye swimming pool, iko Masaki karibu na bahari.',
                'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=800',
            ],
            [
                'name' => 'Plot of Land (Kiwanja) - Kigamboni Gezaulole',
                'price' => 45000000,
                'old_price' => 50000000,
                'description' => 'Kiwanja kina ukubwa wa 1,200 SQM, kina hati miliki na kiko karibu na barabara kuu.',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800',
            ],
            [
                'name' => 'Apartment ya Kisasa - Upanga Dar es Salaam',
                'price' => 350000000,
                'old_price' => 400000000,
                'description' => 'Apartment yenye vyumba 3 vya kulala, lifti na ulinzi wa kutosha.',
                'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800',
            ],
        ];

        foreach ($products as $p) {
            Product::create([
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'price' => $p['price'],
                'old_price' => $p['old_price'],
                'description' => $p['description'],
                'image' => $p['image'],
                'status' => 'active',
            ]);
        }
    }
}
