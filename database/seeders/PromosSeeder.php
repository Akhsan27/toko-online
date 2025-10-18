<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promos;

class PromosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promos::insert([
            ['code' => 'DISKON10', 'type' => 'percentage', 'value' => 10.00, 'min_purchase' => 50000, 'end_date' => now()->addDays(30), 'is_active' => true],
            ['code' => 'RP50000', 'type' => 'amount', 'value' => 50000.00, 'min_purchase' => 100000, 'end_date' => now()->addDays(7), 'is_active' => true],
        ]);
    }
}
