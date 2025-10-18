<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brands;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::insert([
            ['name' => 'Nike','slug' => 'nike'],
            ['name' => 'Ventela','slug' => 'ventela'],
            ['name' => 'Compass','slug' => 'compass'],
        ]);
    }
}
