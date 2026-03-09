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
            [
                'name' => 'Mercedes-Benz C200 (Year 2016)',
                'price' => 110000000,
                'old_price' => 125000000,
                'description' => 'Gari ya kifahari, imetunzwa vizuri, kilometa 40k tu.',
                'image' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=800',
            ],
            [
                'name' => 'Land Rover Discovery Sport',
                'price' => 145000000,
                'old_price' => 160000000,
                'description' => 'Gari bora kwa safari za mbali na maeneo magumu, 4WD.',
                'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=800',
            ],
            [
                'name' => 'Suzuki Carry (Kirikuu) - White',
                'price' => 15000000,
                'old_price' => 17000000,
                'description' => 'Gari nzuri kwa biashara ya usafirishaji mizigo midogo mijini.',
                'image' => 'https://images.unsplash.com/photo-1519307212971-dd9561667ffb?q=80&w=800',
            ],

            // HOUSES
            [
                'name' => 'Modern 4-Bedroom House in Masaki',
                'price' => 1200000000,
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
            [
                'name' => 'Villas in Mbezi Beach - Shoreline View',
                'price' => 850000000,
                'old_price' => 950000000,
                'description' => 'Villa mpya kabisa, vyumba 5, balcony inatazama bahari ya Hindi.',
                'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=800',
            ],
            [
                'name' => 'Warehouse in Mikocheni Industrial Area',
                'price' => 2500000000,
                'old_price' => 3000000000,
                'description' => 'Eneo la ghala kubwa lenye ofisi na nafasi ya kutosha kwa malori.',
                'image' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=800',
            ],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(
                ['slug' => Str::slug($p['name'])],
                [
                    'name' => $p['name'],
                    'price' => $p['price'],
                    'old_price' => $p['old_price'],
                    'description' => $p['description'],
                    'image' => $p['image'],
                    'status' => 'active',
                ]
            );
        }
    }
}
