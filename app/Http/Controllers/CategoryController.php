<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  
    public function showAll($slug)
    {
        // Ambil semua kategori untuk header
        $category = Category::where('slug', $slug)
        ->with(['products'=>function ($query){
            $query -> where('is_active', true)
                    -> orderBy('created_at', 'desc');
        }])
        ->firstOrFail();

        $products = $category->products;

        return view('showAll', compact('category', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'images' => null 
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }
}
