<?php

// database/seeders/CategorySeeder.php

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
            | CORE MENU CATEGORIES (TOP NAV)
            |--------------------------------------------------------------------------
            */

            $coreCategories = [
                ['name' => 'Masoko',      'description' => 'Masoko ya ndani na nje'],
                ['name' => 'Uchumi',      'description' => 'Habari na takwimu za uchumi'],
                ['name' => 'Biashara',    'description' => 'Biashara na uwekezaji'],
                ['name' => 'Teknolojia',  'description' => 'Teknolojia na ubunifu'],
                ['name' => 'Jiopolitiki', 'description' => 'Siasa na mahusiano ya kimataifa'],
                ['name' => 'Fedha',       'description' => 'Fedha, benki na masoko ya mitaji'],
                ['name' => 'Mawasiliano', 'description' => 'Mawasiliano na TEHAMA'],
            ];

            foreach ($coreCategories as $cat) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($cat['name'])],
                    [
                        'name'        => $cat['name'],
                        'description' => $cat['description'],
                        'is_main'     => 1,
                        'status'      => 1,
                    ]
                );
            }

            /*
            |--------------------------------------------------------------------------
            | NON-CORE / CONTENT CATEGORIES (NOT IN MAIN MENU)
            |--------------------------------------------------------------------------
            */

            $otherCategories = [
                'Siasa',
                'World',
                'Health',
                'Lifestyle',
                'Technology Reviews',
                'AI & Robotics',
                'Startups',
                'Markets',
                'Energy',
                'Agriculture',
                'Education',
                'Environment',
                'Sports',
                'Travel',
                'Food',
                'Culture',
                'Reviews',
                'Advisory',
                'Features',
            ];

            foreach ($otherCategories as $name) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($name)],
                    [
                        'name'    => $name,
                        'is_main' => 0,
                        'status'  => 1,
                    ]
                );
            }

        });
    }
}
