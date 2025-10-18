<?php

namespace Database\Seeders;

use App\Models\Addresses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatauserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Addresses::create([
            'user_id' => '5',
            'first_name' => 'Akhsan',
            'last_name' => 'umam',
            'phone' => '0859468549',
            'address' => 'jl ahmad yani no 15 purwokerto utara',
            'province' => 'Jawa tengah',
            'city' => 'purwokerto',
            'postal_code' => '3241',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
