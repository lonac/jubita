<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product\Product;
use App\Models\Setting\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catMagari     = Category::where('slug', 'magari')->first();
        $catSimu       = Category::where('slug', 'simu-na-elektroniki')->first();
        $catNyumba     = Category::where('slug', 'nyumba-na-ardhi')->first();
        $catChakula    = Category::where('slug', 'chakula-na-kilimo')->first();
        $catMitambo    = Category::where('slug', 'mitambo-na-vifaa')->first();
        $catMavazi     = Category::where('slug', 'mavazi-na-nguo')->first();
        $catSamani     = Category::where('slug', 'samani-na-nyumba')->first();

        $products = [
            // ============ MAGARI ============
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Toyota Land Cruiser V8 2020 - Diesel - Automatic',
                'description'  => '<p>Toyota Land Cruiser V8 mwaka 2020, hali nzuri sana. Imefika Tanzania mwaka 2022, imehudumiwa vizuri. Mileage ni km 65,000. Inapendeza sana kwa safari za mbali na mjini. Ina sunroof, leather seats, navigation system, camera ya nyuma na vifaa vingi vya safety.</p><p><strong>Vipengele:</strong></p><ul><li>Engine: 4.5L V8 Diesel Twin Turbo</li><li>Gearbox: Automatic 6-speed</li><li>Mileage: 65,000 km</li><li>Rangi: Nyeupe Pearl</li><li>Vititi: 7</li><li>Drive: 4WD</li></ul>',
                'price'        => 195000000,
                'old_price'    => 210000000,
                'condition'    => 'used',
                'location'     => 'Msasani - Dar es Salaam',
                'seller_name'  => 'Salim Jumanne',
                'phone'        => '+255 754 123 456',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/toyota,land,cruiser?lock=1',
                'meta'         => ['make' => 'Toyota', 'model' => 'Land Cruiser V8', 'year' => '2020', 'mileage' => '65000', 'fuel_type' => 'diesel', 'transmission' => 'automatic', 'color' => 'Nyeupe', 'body_type' => 'SUV', 'engine_cc' => '4500'],
            ],
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Toyota Hilux GD6 2021 - Double Cab - 4x4',
                'description'  => '<p>Toyota Hilux GD6 mwaka 2021, mileage km 48,000 tu. Gari bora kwa biashara na usafiri wa nyanjani. Yenye tray ya nyuma kubwa, bull bar, canopy, na roll bar. Imehifadhiwa vizuri sana.</p><p>Gari ina kipande cha TRA, ni halali kabisa.</p>',
                'price'        => 115000000,
                'old_price'    => null,
                'condition'    => 'used',
                'location'     => 'Mbezi Beach - Dar es Salaam',
                'seller_name'  => 'ABC Motors Tanzania',
                'phone'        => '+255 689 234 567',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/toyota,hilux,pickup?lock=1',
                'meta'         => ['make' => 'Toyota', 'model' => 'Hilux GD6', 'year' => '2021', 'mileage' => '48000', 'fuel_type' => 'diesel', 'transmission' => 'manual', 'color' => 'Nyekundu', 'body_type' => 'Pickup', 'engine_cc' => '2400'],
            ],
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Suzuki Vitara 2019 - Petrol - Sunroof - Low Mileage',
                'description'  => '<p>Suzuki Vitara 2019 yenye mileage ndogo sana ya km 38,000. Gari hii ni nzuri sana kwa familia na safari za mjini. Ina sunroof, rear camera, cruise control na viti vya ngozi. Imehifadhiwa kwa makini sana.</p>',
                'price'        => 55000000,
                'old_price'    => 62000000,
                'condition'    => 'used',
                'location'     => 'Mikocheni - Dar es Salaam',
                'seller_name'  => 'Zainab Mohamed',
                'phone'        => '+255 712 345 678',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/suzuki,vitara,suv?lock=1',
                'meta'         => ['make' => 'Suzuki', 'model' => 'Vitara', 'year' => '2019', 'mileage' => '38000', 'fuel_type' => 'petrol', 'transmission' => 'automatic', 'color' => 'Kijivu', 'body_type' => 'SUV', 'engine_cc' => '1400'],
            ],
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Nissan X-Trail T32 2018 - Petrol - 7 Seats',
                'description'  => '<p>Nissan X-Trail T32 mwaka 2018, yenye vititi 7. Gari bora kwa familia kubwa. Ina camera ya 360 degrees, parking sensors, roof rails, na vifaa vingi vya teknolojia. Mileage km 72,000, hali nzuri.</p>',
                'price'        => 62000000,
                'old_price'    => null,
                'condition'    => 'used',
                'location'     => 'Sinza - Dar es Salaam',
                'seller_name'  => 'Peter Mwangaza',
                'phone'        => '+255 765 456 789',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/nissan,x-trail,suv?lock=1',
                'meta'         => ['make' => 'Nissan', 'model' => 'X-Trail T32', 'year' => '2018', 'mileage' => '72000', 'fuel_type' => 'petrol', 'transmission' => 'automatic', 'color' => 'Nyeupe', 'body_type' => 'SUV', 'engine_cc' => '2000'],
            ],
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Mercedes-Benz C200 2017 - Petrol - Saloon - Msasani',
                'description'  => '<p>Mercedes-Benz C200 mwaka 2017, gari bora kwa ubarikio na faraja. Ina mileage km 85,000, hali nzuri sana. Viti vya ngozi, panoramic sunroof, sound system ya Burmester, na mfumo wa intaneti wa ndani.</p><p>Bei ni ya mazungumzo kidogo kwa mnunuzi wa makini.</p>',
                'price'        => 58000000,
                'old_price'    => 65000000,
                'condition'    => 'used',
                'location'     => 'Msasani - Dar es Salaam',
                'seller_name'  => 'Grace Temba',
                'phone'        => '+255 786 567 890',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/mercedes,benz,sedan?lock=1',
                'meta'         => ['make' => 'Mercedes-Benz', 'model' => 'C200', 'year' => '2017', 'mileage' => '85000', 'fuel_type' => 'petrol', 'transmission' => 'automatic', 'color' => 'Nyeusi', 'body_type' => 'Saloon', 'engine_cc' => '1991'],
            ],
            [
                'category_id'  => $catMagari?->id,
                'name'         => 'Bajaji Qute 3-Wheeler 2023 - Mpya Kabisa',
                'description'  => '<p>Bajaji Qute mwaka 2023, bado haijawahi kutumika. Gari nzuri sana kwa biashara ndogo ndogo mjini. Inatumia petrol kidogo sana. Inafaa kwa usafirishaji wa abiria na bidhaa ndogo. Bei pamoja na usajili.</p>',
                'price'        => 8500000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Magomeni - Dar es Salaam',
                'seller_name'  => 'Tanzania Auto Dealers Ltd',
                'phone'        => '+255 713 678 901',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/tuk,tuk,bajaj?lock=1',
                'meta'         => ['make' => 'Bajaji', 'model' => 'Qute', 'year' => '2023', 'mileage' => '0', 'fuel_type' => 'petrol', 'transmission' => 'manual', 'color' => 'Njano', 'body_type' => 'Tuk-tuk', 'engine_cc' => '216'],
            ],

            // ============ SIMU NA ELEKTRONIKI ============
            [
                'category_id'  => $catSimu?->id,
                'name'         => 'iPhone 15 Pro Max 256GB - Natural Titanium - Mpya',
                'description'  => '<p>iPhone 15 Pro Max, 256GB, rangi ya Natural Titanium. Mpya kabisa kutoka duka, ina warranty ya mwaka mmoja. Ina kamera ya juu sana ya 48MP na uchezaji mzuri wa video 4K. Inafaa kwa biashara na burudani.</p>',
                'price'        => 3800000,
                'old_price'    => 4200000,
                'condition'    => 'new',
                'location'     => 'Posta - Dar es Salaam',
                'seller_name'  => 'TechShop Tanzania',
                'phone'        => '+255 744 789 012',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/iphone,apple,smartphone?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catSimu?->id,
                'name'         => 'Samsung Galaxy S24 Ultra 512GB - Phantom Black',
                'description'  => '<p>Samsung Galaxy S24 Ultra, 512GB storage, Phantom Black. Ina S-Pen iliyojengwa ndani, kamera ya 200MP, na battery kubwa ya 5000mAh. Nzuri kwa kazi na michezo. Ina warranty ya mwaka mmoja Tanzania.</p>',
                'price'        => 3200000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Kariakoo - Dar es Salaam',
                'seller_name'  => 'Mobile World Tanzania',
                'phone'        => '+255 755 890 123',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/samsung,galaxy,phone?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catSimu?->id,
                'name'         => 'HP Laptop ProBook 450 G9 - Intel Core i7 - 16GB RAM',
                'description'  => '<p>HP ProBook 450 G9, processor Intel Core i7 ya kizazi cha 12, RAM 16GB, SSD 512GB, screen 15.6 inch Full HD. Nzuri sana kwa biashara na masomo. Imetumika kidogo tu, mwaka mmoja. Ina bag ya laptop na charger.</p>',
                'price'        => 1850000,
                'old_price'    => 2200000,
                'condition'    => 'fairly_used',
                'location'     => 'Upanga - Dar es Salaam',
                'seller_name'  => 'James Mwakisunga',
                'phone'        => '+255 768 901 234',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/laptop,hp,computer?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catSimu?->id,
                'name'         => 'Samsung 55" QLED Smart TV 4K - UHD - HDR10+',
                'description'  => '<p>Samsung 55 inch QLED Smart TV, 4K Ultra HD, HDR10+. Ina WIFI, Bluetooth, na inaungana na simu ya Android na iPhone. Inafanya kazi vizuri na M-Pesa na programu za streaming kama Netflix, YouTube. Mpya kutoka duka.</p>',
                'price'        => 1450000,
                'old_price'    => 1700000,
                'condition'    => 'new',
                'location'     => 'Mlimani City - Dar es Salaam',
                'seller_name'  => 'Electronics Hub DSM',
                'phone'        => '+255 779 012 345',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/television,tv,flatscreen?lock=1',
                'meta'         => [],
            ],

            // ============ NYUMBA NA ARDHI ============
            [
                'category_id'  => $catNyumba?->id,
                'name'         => 'Nyumba ya Kupanga - Mikocheni A - Vyumba 3 - Gari ndani',
                'description'  => '<p>Nyumba nzuri sana ya kupanga katika eneo zuri la Mikocheni A, Dar es Salaam. Ina vyumba 3 vya kulala, sebule kubwa, jiko la kisasa, choo 2, na nafasi ya gari ndani. Ina maji ya DAWASCO na umeme wa TANESCO wa uhakika. Karibu na shule, hospitali na maduka.</p><p><strong>Kodi:</strong> Shilingi 800,000 kwa mwezi (miaka miwili ya mapema)</p>',
                'price'        => 800000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Mikocheni A - Dar es Salaam',
                'seller_name'  => 'Fatuma Real Estate',
                'phone'        => '+255 754 123 789',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/house,tropical,home?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catNyumba?->id,
                'name'         => 'Kiwanja cha Kuuza Mbezi Beach - Ekari 0.5 - Hati ya Kusajili',
                'description'  => '<p>Kiwanja kizuri sana cha nusu ekari (1,000 sqm) katika eneo la Mbezi Beach, Dar es Salaam. Eneo hili ni la kisasa na la amani. Kiwanja kina hati ya kusajili (Certificate of Right of Occupancy - CRO) iliyotolewa na TIC. Karibu na barabara kuu ya Bagamoyo na bahari.</p><p>Bei ni ya mazungumzo. Tutaongea uwasiliane sasa hivi.</p>',
                'price'        => 85000000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Mbezi Beach - Dar es Salaam',
                'seller_name'  => 'Ali Hassan Property',
                'phone'        => '+255 787 234 890',
                'is_featured'  => true,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/land,field,green?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catNyumba?->id,
                'name'         => 'Apartment ya Kuuza - Masaki - Ghorofa ya 4 - Sea View',
                'description'  => '<p>Apartment nzuri kabisa katika jengo la kisasa Masaki, Dar es Salaam. Iko ghorofani ya nne na ina mtazamo mzuri wa bahari. Ina vyumba 2 vya kulala, sebule, jiko la kisasa, kiyoyozi, na gari ya parking. Jengo lina security ya 24 hours na generator.</p>',
                'price'        => 320000000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Masaki - Dar es Salaam',
                'seller_name'  => 'Prestige Realty Tanzania',
                'phone'        => '+255 754 345 901',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/apartment,building,modern?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catNyumba?->id,
                'name'         => 'Nyumba ya Kuuza - Arusha Mjini - Vyumba 4 - Modern',
                'description'  => '<p>Nyumba ya kisasa ya kuuza Arusha Mjini, karibu na barabara kuu ya Nairobi. Ina vyumba 4 vya kulala, sebule 2, jiko la kisasa na pantry, choo 3, na bustani nzuri. Ina maji ya mji na umeme wa uhakika. Hati ipo, inaweza kuhamishiwa haraka.</p>',
                'price'        => 175000000,
                'old_price'    => 190000000,
                'condition'    => 'new',
                'location'     => 'Arusha Mjini',
                'seller_name'  => 'Kilimanjaro Property Group',
                'phone'        => '+255 765 456 012',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/house,residential?lock=2',
                'meta'         => [],
            ],

            // ============ CHAKULA NA KILIMO ============
            [
                'category_id'  => $catChakula?->id,
                'name'         => 'Mahindi ya Kisayansi (DK8031) - Mbegu - Gunia 1kg',
                'description'  => '<p>Mbegu bora za mahindi ya kisayansi DK8031 zinazostahimili ukame na unyevu mzuri. Zinafaa kwa maeneo ya Tanzania kwa mvua ya wastani. Zinalipa mavuno mazuri sana - hadi gunia 30 kwa ekari moja. Zinalindwa na dawa dhidi ya ugonjwa.</p>',
                'price'        => 32000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Kariakoo - Dar es Salaam',
                'seller_name'  => 'Seedco Tanzania Ltd',
                'phone'        => '+255 776 567 123',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/corn,maize,seeds?lock=1',
                'meta'         => [],
            ],
            [
                'category_id'  => $catChakula?->id,
                'name'         => 'Asali Safi ya Tanzania (1 Lita) - Kutoka Misitu ya Udzungwa',
                'description'  => '<p>Asali safi bila kuchanganywa kutoka misitu ya Udzungwa, Iringa. Haijapikwa, ina ladha nzuri na matibabu mengi ya asili. Imethibitishwa na TFDA. Inafaa kwa matibabu, chakula na bidhaa za urembo. Mbegu 100% asili.</p>',
                'price'        => 28000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Iringa Mjini',
                'seller_name'  => 'Udzungwa Forest Products',
                'phone'        => '+255 787 678 234',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/honey,jar,bee?lock=1',
                'meta'         => [],
            ],

            // ============ MITAMBO ============
            [
                'category_id'  => $catMitambo?->id,
                'name'         => 'Trekta ya Mahindi (Maize Sheller) - Inafanya kazi kwa Injini au Umeme',
                'description'  => '<p>Mashine ya kung\'oa mahindi (maize sheller) inayofanya kazi kwa injini ya petroli au umeme. Inaweza kushughulikia gunia 20-30 kwa saa. Nzuri sana kwa vikundi vya wakulima. Bei ni kwa mashine moja yenye injini.</p>',
                'price'        => 3800000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Dodoma Mjini',
                'seller_name'  => 'Agri-Tech Tanzania',
                'phone'        => '+255 798 789 345',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/tractor,farm,machine?lock=1',
                'meta'         => [],
            ],

            // ============ MAVAZI ============
            [
                'category_id'  => $catMavazi?->id,
                'name'         => 'Kitenge cha Tanzania - Mita 6 - Mchoro wa Asili',
                'description'  => '<p>Kitenge kizuri cha Tanzania chenye mchoro wa asili na rangi nzuri za angavu. Kinafaa kwa nguo za sherehe, kanga, na mavazi ya kila siku. Kinatoka kiwanda cha ndani na kina ubora wa juu. Mita 6 (nguo moja kamili).</p>',
                'price'        => 45000,
                'old_price'    => null,
                'condition'    => 'new',
                'location'     => 'Kariakoo - Dar es Salaam',
                'seller_name'  => 'Tanzania Textile Shop',
                'phone'        => '+255 709 890 456',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/fabric,textile,african?lock=1',
                'meta'         => [],
            ],

            // ============ SAMANI ============
            [
                'category_id'  => $catSamani?->id,
                'name'         => 'Sofa Set ya Kisasa - Vipande 7 - Ngozi ya Kweli - Dar es Salaam',
                'description'  => '<p>Sofa set nzuri kabisa ya kisasa yenye vipande 7 (sofa ya vititi 3, sofa ya vititi 2, na viti 2 vya mtu mmoja). Imefanywa kwa ngozi ya kweli na mbao ngumu. Rangi ya kahawia giza. Inafaa sana kwa nyumba ya kisasa na ofisi za heshima.</p>',
                'price'        => 2800000,
                'old_price'    => 3500000,
                'condition'    => 'new',
                'location'     => 'Kawe - Dar es Salaam',
                'seller_name'  => 'Comfort Home Tanzania',
                'phone'        => '+255 720 901 567',
                'is_featured'  => false,
                'status'       => 'active',
                'image'        => 'https://loremflickr.com/800/600/sofa,couch,furniture?lock=1',
                'meta'         => [],
            ],
        ];

        foreach ($products as $data) {
            if (empty($data['category_id'])) continue;

            $meta = $data['meta'] ?? [];
            unset($data['meta']);

            $baseName = $data['name'];
            $slug = Str::slug($baseName) . '-' . Str::random(4);

            // Check if slug exists and if so use a new one
            while (Product::where('slug', $slug)->exists()) {
                $slug = Str::slug($baseName) . '-' . Str::random(6);
            }

            Product::create(array_merge($data, [
                'slug' => $slug,
                'meta' => !empty($meta) ? $meta : null,
            ]));
        }
    }
}
