<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

// Welcome Page (Protected Route)
Route::get('/welcome', [AuthController::class, 'showWelcome'])
    ->name('welcome');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Guest Order
Route::get('/guest-order', [AuthController::class, 'guestOrder'])->name('guest.order');

// Homepage (Public Routes)
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::post('/add-to-cart', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'getCart']);

// Checkout (Protected Route)
Route::get('/checkout', [OrderController::class, 'checkout'])
    ->name('checkout')
    ->middleware('auth'); // Only authenticated users can access
Route::post('/checkout', [OrderController::class, 'placeOrder'])
    ->name('placeOrder')
    ->middleware('auth'); // Only authenticated users can place an order
