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
                ['name' => 'Uchumi', 'description' => 'Habari na takwimu za uchumi', 'is_main' => 1],
                ['name' => 'Jiopolitiki', 'description' => 'Siasa na mahusiano ya kimataifa', 'is_main' => 1],
                ['name' => 'Biashara', 'description' => 'Biashara na uwekezaji', 'is_main' => 1],
                ['name' => 'Masoko', 'description' => 'Masoko ya ndani na nje', 'is_main' => 1],
                ['name' => 'Teknolojia', 'description' => 'Teknolojia na ubunifu', 'is_main' => 1],
                ['name' => 'Advisory', 'description' => 'Ushauri wa kifedha', 'is_main' => 1],
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
                'Uchumi' => [
                    'Kilimo', 
                    'Biashara', 
                    'Utalii', 
                    'Nishati', 
                    'Uzalishaji', 
                    'Ujenzi'
                ],
                'Jiopolitiki' => [
                    'Taifa (Tanzania)', 
                    'Mataifa (Global)', 
                    'Diplomasia', 
                    'Ulinzi'
                ],
                'Biashara' => [
                    'Uwekezaji', 
                    'Viwanda', 
                    'Ujasiriamali', 
                    'Soko la Hisa (DSE)'
                ],
                'Masoko' => [
                    'Dhahabu na Madini', 
                    'Bidhaa za Kilimo', 
                    'Fedha za Kigeni', 
                    'Hisa na Dhamana'
                ],
                'Teknolojia' => [
                    'TEHAMA', 
                    'Ubunifu', 
                    'Fintech', 
                    'Mkongo wa Taifa'
                ],
                'Advisory' => [
                    'Usimamizi wa Fedha', 
                    'Kodi (TRA)', 
                    'Uwekezaji wa Nyumba', 
                    'Hisa'
                ],
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
