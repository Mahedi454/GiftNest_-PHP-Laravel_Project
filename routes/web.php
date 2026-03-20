<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GiftNest - Web Routes (PRD scaffold)
|--------------------------------------------------------------------------
| These routes map 1:1 to the PRD pages so the UI can be built early.
| Later, replace closures with controllers and add auth/middleware.
*/

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::view('/cart', 'pages.cart')->name('cart');
Route::view('/checkout', 'pages.checkout')->name('checkout');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// Auth pages (UI scaffold)
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');

// User dashboard pages (UI scaffold)
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
Route::view('/orders', 'pages.orders')->name('orders');
Route::view('/wishlist', 'pages.wishlist')->name('wishlist');

// Admin panel (UI scaffold)
Route::prefix('admin')->group(function () {
    Route::view('/', 'pages.admin.index')->name('admin.index');
    Route::view('/products', 'pages.admin.products')->name('admin.products');
    Route::view('/orders', 'pages.admin.orders')->name('admin.orders');
    Route::view('/users', 'pages.admin.users')->name('admin.users');
});

