<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'administrative_expenses',
            'loan_provision',
            'salary_wages',
            'office_supplies',
            'office_rent',
            'utilities',
            'marketing_promotion',
            'insurance',
            'audit_fees',
            'training_expenses',
            'loan_interest',
            'bank_charges',
            'legal_fees',
            'technology_expenses',
            'transportation',
            'miscellaneous',
        ];

        foreach ($categories as $category) {
            DB::table('expense_categories')->insert([
                'name' => $category,
                'status' => 1,  
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
