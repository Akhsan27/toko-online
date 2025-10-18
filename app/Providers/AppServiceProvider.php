<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $request = request();

            $route = $request->route(); // ✅ ini method yang benar
            $admin = $route ? $route->getName() : null;

            if ($admin && str_starts_with($admin, 'admin.')) {
                // misalnya tampilkan semua kategori
                $categories =Category::latest()->get();
            } else {
                // hanya kategori dengan produk aktif
                $categories = Category::with(['products' => function ($q) {
                    $q->where('is_active', true);
                }])->whereHas('products', function ($q) {
                    $q->where('is_active', true);
                })->latest()->get();
            }

            $view->with('categories', $categories);
        });
    }
}
