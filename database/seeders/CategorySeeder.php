<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            /*
            |--------------------------------------------------------------------------
            | PARENT CATEGORIES (Main Menu)
            |--------------------------------------------------------------------------
            */
            $parentCategories = [
                ['name' => 'UCHUMI', 'description' => 'Habari na takwimu za uchumi', 'is_main' => 1],
                ['name' => 'JIOPOLITIKI', 'description' => 'Siasa na mahusiano ya kimataifa', 'is_main' => 1],
                ['name' => 'BIASHARA', 'description' => 'Biashara na Uwekezaji', 'is_main' => 1],
                ['name' => 'MASOKO', 'description' => 'Masoko ya Fedha na Bidhaa', 'is_main' => 1],
                ['name' => 'TEKNOLOJIA', 'description' => 'Teknolojia na Ubunifu', 'is_main' => 1],
                ['name' => 'MAWASILIANO', 'description' => 'Soko la Magari', 'is_main' => 1],
            ];

            foreach ($parentCategories as $cat) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($cat['name'])],
                    [
                        'name' => $cat['name'],
                        'description' => $cat['description'],
                        'is_main' => $cat['is_main'],
                        'status' => 1,
                    ]
                );
            }

            /*
            |--------------------------------------------------------------------------
            | CHILD CATEGORIES (Dropdown Items)
            |--------------------------------------------------------------------------
            */
            $children = [
                'UCHUMI' => [
                    'Kilimo', 
                    'Viwanda', 
                    'Utalii', 
                    'Nishati', 
                    'Uzalishaji', 
                    'Ujenzi'
                ],
                'JIOPOLITIKI' => [
                    'Taifa', 
                    'Mataifa', 
                    'Diplomasia', 
                    'Ulinzi',
                    'Utawala Bora'
                ],
                'BIASHARA' => [
                    'Uwekezaji', 
                    'Ujasiriamali', 
                    'Soko la Hisa',
                    'Kodi na Sheria'
                ],
                'MASOKO' => [
                    'Dhahabu na Madini', 
                    'Bidhaa za Kilimo', 
                    'Fedha za Kigeni', 
                    'Hisa na Dhamana'
                ],
                'TEKNOLOJIA' => [
                    'TEHAMA', 
                    'Ubunifu', 
                    'Fintech', 
                    'Mkongo wa Taifa',
                    'AI & Robotiki'
                ],
                'NYUMBA' => [
                    'Kupanga',
                    'Kununua',
                    'Viwanja',
                    'Miradi Mipya'
                ],
                'MAGARI' => [
                    'Magari Mapya',
                    'Used Cars',
                    'Spea na Service'
                ]
            ];

            foreach ($children as $parentName => $childNames) {
                $parent = Category::where('name', $parentName)->first();
                if ($parent) {
                    foreach ($childNames as $childName) {
                        Category::updateOrCreate(
                            ['slug' => Str::slug($childName)],
                            [
                                'name' => $childName,
                                'parent_id' => $parent->id,
                                'is_main' => 0,
                                'status' => 1,
                            ]
                        );
                    }
                }
            }
        });
    }
}
