<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.detail');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/shops/{id}', [ShopController::class, 'show'])->name('shops.show');
