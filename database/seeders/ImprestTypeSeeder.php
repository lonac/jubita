<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting\ImprestType;


class ImprestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fee = new ImprestType;
        $fee->name = "Safari Imprest";
        $fee->save();

        $data = new ImprestType;
        $data->name = "Standing Imprest";
        $data->save();
    }
}
