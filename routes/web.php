<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProductController::class, 'index'])->name('produk');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('tentang');
Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');
Route::get('/cari', [ProductController::class, 'search'])->name('produk.cari');

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::resource('admin/produk', ProductController::class);
    Route::resource('admin/kategori', CategoryController::class);
});
