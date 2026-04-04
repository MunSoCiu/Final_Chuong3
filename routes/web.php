<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;

// 👉 Trang chủ = shop
Route::get('/', [ProductController::class, 'home'])->name('home');

// 👉 Dashboard (admin)
Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');

// CRUD
Route::resource('products', ProductController::class)->except(['show']);

// 👉 Lịch sử thao tác
Route::get('/history', [ProductController::class, 'history'])->name('history');