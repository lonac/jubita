<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // =========================================================
        // NEWS CATEGORIES
        // =========================================================
        $newsCategories = [
            [
                'name' => 'UCHUMI', 'slug' => 'uchumi', 'is_main' => 1,
                'description' => 'Habari za uchumi wa Tanzania na Afrika Mashariki',
                'children' => [
                    ['name' => 'Benki na Fedha',            'slug' => 'benki-na-fedha'],
                    ['name' => 'Biashara ya Kimataifa',      'slug' => 'biashara-ya-kimataifa'],
                    ['name' => 'Uwekezaji',                  'slug' => 'uwekezaji'],
                    ['name' => 'Manunuzi ya Serikali',       'slug' => 'manunuzi-ya-serikali'],
                ],
            ],
            [
                'name' => 'BIASHARA', 'slug' => 'biashara', 'is_main' => 1,
                'description' => 'Habari za biashara, kampuni na ujasiriamali Tanzania',
                'children' => [
                    ['name' => 'Biashara Ndogo (SME)',   'slug' => 'biashara-ndogo'],
                    ['name' => 'Kampuni Kubwa',          'slug' => 'kampuni-kubwa'],
                    ['name' => 'Kilimo Biashara',        'slug' => 'kilimo-biashara'],
                    ['name' => 'Hisa za DSE',            'slug' => 'hisa-dse'],
                ],
            ],
            [
                'name' => 'JIOPOLITIKI', 'slug' => 'jiopolitiki', 'is_main' => 1,
                'description' => 'Habari za siasa za ndani na nje ya Tanzania',
                'children' => [
                    ['name' => 'Siasa za Tanzania',      'slug' => 'siasa-tanzania'],
                    ['name' => 'Afrika Mashariki (EAC)', 'slug' => 'eac-afrika-mashariki'],
                    ['name' => 'Habari za Dunia',        'slug' => 'habari-dunia'],
                    ['name' => 'Uchaguzi',               'slug' => 'uchaguzi'],
                ],
            ],
            [
                'name' => 'MASOKO', 'slug' => 'masoko', 'is_main' => 1,
                'description' => 'Habari na taarifa za masoko ya fedha na bidhaa',
                'children' => [
                    ['name' => 'Soko la Hisa DSE',   'slug' => 'soko-hisa-dse'],
                    ['name' => 'Bei za Bidhaa',      'slug' => 'bei-bidhaa'],
                    ['name' => 'Fedha za Kigeni',    'slug' => 'fedha-za-kigeni'],
                    ['name' => 'Mali Ghafi',         'slug' => 'mali-ghafi'],
                ],
            ],
            [
                'name' => 'TEKNOLOJIA', 'slug' => 'teknolojia', 'is_main' => 1,
                'description' => 'Habari za teknolojia, kidijitali na uvumbuzi',
                'children' => [
                    ['name' => 'Simu na Intaneti',       'slug' => 'simu-na-intaneti'],
                    ['name' => 'Akili Bandia (AI)',       'slug' => 'akili-bandia'],
                    ['name' => 'Startups Tanzania',      'slug' => 'startups-tanzania'],
                    ['name' => 'Fedha za Kidijitali',    'slug' => 'fedha-kidijitali'],
                ],
            ],
            [
                'name' => 'MAWASILIANO', 'slug' => 'mawasiliano', 'is_main' => 1,
                'description' => 'Habari za vyombo vya habari na mawasiliano',
                'children' => [
                    ['name' => 'Habari za Vyombo',     'slug' => 'habari-vyombo'],
                    ['name' => 'Redio na TV',          'slug' => 'redio-na-tv'],
                    ['name' => 'Mitandao ya Kijamii',  'slug' => 'mitandao-kijamii'],
                ],
            ],
            [
                'name' => 'KILIMO', 'slug' => 'kilimo', 'is_main' => 0,
                'description' => 'Habari za sekta ya kilimo na chakula Tanzania',
                'children' => [
                    ['name' => 'Mazao ya Chakula',  'slug' => 'mazao-chakula'],
                    ['name' => 'Mifugo na Uvuvi',   'slug' => 'mifugo-uvuvi'],
                    ['name' => 'Umwagiliaji',       'slug' => 'umwagiliaji'],
                ],
            ],
            [
                'name' => 'NISHATI', 'slug' => 'nishati', 'is_main' => 0,
                'description' => 'Habari za nishati, gesi na maliasili Tanzania',
                'children' => [
                    ['name' => 'Gesi Asili',        'slug' => 'gesi-asili'],
                    ['name' => 'Nishati Jadidifu',  'slug' => 'nishati-jadidifu'],
                    ['name' => 'Madini',            'slug' => 'madini'],
                ],
            ],
        ];

        foreach ($newsCategories as $data) {
            $children = $data['children'] ?? [];
            unset($data['children']);

            $parent = Category::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['category_type' => 'news', 'status' => 1])
            );

            foreach ($children as $child) {
                Category::updateOrCreate(
                    ['slug' => $child['slug']],
                    [
                        'name'          => $child['name'],
                        'parent_id'     => $parent->id,
                        'is_main'       => 0,
                        'category_type' => 'news',
                        'status'        => 1,
                    ]
                );
            }
        }

        // =========================================================
        // MARKETPLACE / PRODUCT CATEGORIES
        // =========================================================
        $productCategories = [
            ['name' => 'Magari',               'slug' => 'magari',              'icon' => 'fa-car',         'color' => '#c0392b'],
            ['name' => 'Simu na Elektroniki',  'slug' => 'simu-na-elektroniki', 'icon' => 'fa-mobile-alt',  'color' => '#2980b9'],
            ['name' => 'Nyumba na Ardhi',      'slug' => 'nyumba-na-ardhi',     'icon' => 'fa-home',        'color' => '#27ae60'],
            ['name' => 'Chakula na Kilimo',    'slug' => 'chakula-na-kilimo',   'icon' => 'fa-seedling',    'color' => '#e67e22'],
            ['name' => 'Mitambo na Vifaa',     'slug' => 'mitambo-na-vifaa',    'icon' => 'fa-tools',       'color' => '#7f8c8d'],
            ['name' => 'Mavazi na Nguo',       'slug' => 'mavazi-na-nguo',      'icon' => 'fa-tshirt',      'color' => '#9b59b6'],
            ['name' => 'Samani na Nyumba',     'slug' => 'samani-na-nyumba',    'icon' => 'fa-couch',       'color' => '#d35400'],
        ];

        foreach ($productCategories as $data) {
            Category::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, [
                    'is_main'       => 0,
                    'category_type' => 'product',
                    'status'        => 1,
                ])
            );
        }
    }
}
