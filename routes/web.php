<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; // tambahkan ini
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
//use Illuminate\Support\Facades\Route;

// Route Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route About
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
// Route Products
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/admin', [AdminHomeController::class, 'index'])->name("admin.home.index");
Route::get('/admin/products', [AdminProductController::class, 'index'])->name("admin.product.index");
Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name("admin.product.store");
Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.product.edit');
Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])
    ->name('admin.product.update');
Auth::routes();
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', [CartController::class, 'purchase'])->name('cart.purchase');
});
Route::get('/my-account/orders', [MyAccountController::class, 'orders'])->name('myaccount.orders');