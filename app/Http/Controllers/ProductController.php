<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use function Laravel\Prompts\progress;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil kategori dengan maksimal 10 produk aktif per kategori
        $categoriesTake = Category::with(['products' => function ($query) {
            $query->where('is_active', true)
                ->latest()
                ->take(10);
        }])
            ->whereHas('products', function ($query) {
                $query->where('is_active', true);
            })
            ->latest()
            ->get();

        $products = Product::with('category')->latest()->take(10)->get();

        return view('index', compact('products', 'categoriesTake'));
    }
    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->latest()
            ->take(12)
            ->get();
        return view('detail', [
            'product' => $product,
            'relatedProduct' => $relatedProducts
        ]);
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
