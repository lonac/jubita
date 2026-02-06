<?php

// database/seeders/PostTypeSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting\PostType;
use Illuminate\Support\Facades\DB;

class PostTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            $postTypes = [
                [
                    'name' => 'News',
                    'description' => 'Breaking news and current affairs',
                    'status' => 1,
                ],
                [
                    'name' => 'Feature',
                    'description' => 'In-depth feature stories',
                    'status' => 1,
                ],
                [
                    'name' => 'Review',
                    'description' => 'Product and service reviews',
                    'status' => 1,
                ],
                [
                    'name' => 'Advisory',
                    'description' => 'Expert advice and guidance',
                    'status' => 1,
                ],
                [
                    'name' => 'Tech',
                    'description' => 'Technology and innovation content',
                    'status' => 1,
                ],
                [
                    'name' => 'Lifestyle',
                    'description' => 'Lifestyle, culture, and living',
                    'status' => 1,
                ],
            ];

            foreach ($postTypes as $type) {
                PostType::updateOrCreate(
                    ['name' => $type['name']], // prevent duplicates
                    $type
                );
            }
        });
    }
}
