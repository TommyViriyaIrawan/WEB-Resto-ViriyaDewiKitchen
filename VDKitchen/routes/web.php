<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/add-to-cart', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'getCart']);
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('placeOrder');


