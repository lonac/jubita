<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting\Region;
use App\Models\Setting\District;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionsWithDistricts = [

            'Dodoma' => [
                'Dodoma Urban',
                'Bahi',
                'Chamwino',
                'Chemba',
                'Kondoa',
                'Kongwa',
                'Mpwapwa',
            ],
            'Dar es Salaam' => [
                'Ilala',
                'Kinondoni',
                'Temeke',
                'Ubungo',
                'Kigamboni',
            ],
            'Arusha' => [
                'Arusha Urban',
                'Arumeru',
                'Karatu',
                'Monduli',
                'Ngorongoro',
                'Longido',
            ],
            'Mwanza' => [
                'Nyamagana',
                'Ilemela',
                'Sengerema',
                'Ukerewe',
                'Magu',
                'Kwimba',
                'Misungwi',
            ],
            'Mbeya' => [
                'Mbeya Urban',
                'Mbeya Rural',
                'Rungwe',
                'Chunya',
                'Mbarali',
                'Kyela',
                'Busokelo',
            ],
            'Kilimanjaro' => [
                'Moshi Urban',
                'Moshi Rural',
                'Hai',
                'Rombo',
                'Same',
                'Mwanga',
            ],
        ];

        foreach ($regionsWithDistricts as $regionName => $districts) {
            $region = Region::create([
                'name' => $regionName,
            ]);

            foreach ($districts as $districtName) {
                District::create([
                    'name' => $districtName,
                    'region_id' => $region->id,
                ]);
            }
        }
    }
}
