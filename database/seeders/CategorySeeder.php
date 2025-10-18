<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name'=>'Sneakers', 'slug'=>'sneakers'],
            ['name'=>'Running Shoes', 'slug'=>'running_shoes'],
            ['name'=>'Boots', 'slug'=>'boots'],
            ['name'=>'Formal Shoes','slug'=>'formal_shoes'],
            ['name'=>'Slip-On', 'slug'=>'slip_on'],
            ['name'=>'Sandals', 'slug'=>'sandals'],
            ['name'=>'Outhdoor Shoes', 'slug'=>'outdoor_shoes']
        ]);
    }
}
