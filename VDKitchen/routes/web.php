<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/add-to-cart', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'getCart']);


