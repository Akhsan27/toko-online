<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\User;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/categories/{slug}', [CategoryController::class, 'showAll'])->name('showAll');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('detail');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user', function () {
        return view('dashboard');
    })->name('user.index');
    Route::get('/keranjang', [CartController::class, 'index'])->name('user.keranjang');
    Route::post('/cart/add/{id}', [CartController::class,'add'])->name('cart.add');
    Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('user.checkout');
    Route::get('/cart/totals', [CartController::class, 'getTotals'])->name('cart.totals');
    Route::post('/cart/diskon', [CartController::class, 'diskon'])->name('cart.diskon');
    Route::patch('/cart/{item}',[CartController::class,'update'])->name('cart.update');
    Route::get('/cart/{item}',[CartController::class,'update'])->name('cart.update');
    Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');
    
    //checkout
    Route::get('/checkout', [CheckoutController::class, 'showAddress'])->name('user.checkout');
    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/barang', [AdminController::class, 'produk'])->name('admin.databarang');
    Route::get('/admin/input', [AdminController::class, 'create'])->name('admin.inputbarang');
    Route::post('/admin/input', [AdminController::class, 'input'])->name('admin.inputbarang');
    Route::put('/admin/produk/{id}', [AdminController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/barang/{id}', [AdminController::class, 'destroy'])->name('admin.barang.destroy');


});
require __DIR__ . '/auth.php';
