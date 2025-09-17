<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; // tambahkan ini
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;

// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route About
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
// Route Products
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");
Route::get('/admin/products', [AdminProductController::class, 'index'])->name("admin.product.index");
