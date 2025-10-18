<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Brands;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function produk()
    {
        $products = Product::latest()->get();
        return view('admin.databarang', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        $allcategories = Category::all();


        return view(
            'admin.inputbarang',
            [
                'brands' => $brands,
                'categories' => $allcategories,
            ]

        );
    }

    public function input(Request $request)
    {
        $validate = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'images' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric|',
            'stoks' => 'required|numeric',
            'is_active' => 'nullable|boolean',
            'is_features' => 'nullable|boolean'
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $imageName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $request->images->storeAs('images/products', $imageName, 'public');
        }

        Product::create([
            'name' => $validate['name'],
            'slug' => Str::slug($validate['name']),
            'category_id' => $validate['category_id'],
            'price' => $validate['price'],
            'brand_id' => $validate['brand_id'],
            'stoks' => $validate['stoks'],
            'images' => $imageName,
            'description' => $validate['description'],
            'is_active' => $request->has('is_active'),
            'is_features' => $request->has('is_features')
        ]);

        // query ulang products
        $products = Product::latest()->get();

        return view('admin.databarang', compact('products'))
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brand = Brands::all();
        $categories = Category::all();
        return view('admin.inputbarang', compact('brand', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validate = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'stoks' => 'required|integer',
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $imageName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/products', $imageName, 'public');
            $validate['images'] = $imageName; // masukin ke $validate
        }

        $product->update($validate);

        return redirect()->route('admin.databarang')->with('success', 'Produk berhasil diperbarui');
    }
     public function destroy($id)
    {
        // cari produk berdasarkan id
        $product = Product::find($id);

        // jika tidak ditemukan
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // hapus produk
        $product->delete();

        // kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
