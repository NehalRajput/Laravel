<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/product-details/{id}', [HomeController::class, 'product_details'])->name('product.details');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/add-cart/{id}', [HomeController::class, 'add_cart'])->name('cart.add');
    Route::get('/show-cart', [HomeController::class, 'show_cart']);
    Route::get('/remove-cart/{id}', [HomeController::class, 'remove_cart']);
    Route::get('/cash-order', [HomeController::class, 'cash_order']);
});

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Admin Dashboard (Fix for "Route [admin.dashboard] not defined.")
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/redirect', [HomeController::class, 'redirect']);

    // Category Management
    //Route::get('/category', [AdminController::class, 'view_category'])->name('admin.categories');
   Route::get('/view-category', [AdminController::class, 'view_category']);

    Route::post('/add-category', [AdminController::class, 'add_category']);

    Route::get('/delete-category/{id}', [AdminController::class, 'delete_category'])->name('admin.delete-category');

    // Product Management
    Route::get('/view-product', [AdminController::class, 'view_product'])->name('admin.products');
    Route::post('/add-product', [AdminController::class, 'add_product']);
    Route::get('/show-product', [AdminController::class, 'show_product']);
    Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);
    Route::get('/update-product/{id}', [AdminController::class, 'update_product']);
    Route::post('/update-product-confirm/{id}', [AdminController::class, 'update_product_confirm']);
});
