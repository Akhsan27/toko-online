<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('name', 'sandals')->first();
        $brand = Brands::first();

        //Lokasi file gambar asli
        $sourceFile = public_path('images/sandals.jpg');


        //folder tujuan di storage
        $destinationPath = storage_path('app/public/images/product');

        // Pastikan folder tujuan ada
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Buat 20 produk
        for ($i = 1; $i <= 20; $i++) {
            $name = 'Produk Sandals ' . $i;

            //Buat nama hash untuk gambar baru
            $newName = Str::random(20) . '.jpg';

            //Copy file ke folder tujuan 
            File::copy($sourceFile, $destinationPath .  $newName);

            Product::create([
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'name' => $name,
                'slug' => Str::slug($name),
                'images' => $newName,
                'description' => 'Deskripsi produk Formal sandals ke-' . $i,
                'price' => rand(50000, 300000), // harga acak
                'is_active' => true,
                'stocks' => rand(1, 100),   
                'sale' => rand(0, 50),      
            ]);
        }
    }
}
