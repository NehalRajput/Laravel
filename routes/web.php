<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaticBlockController;

// Public Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/product-details/{id}', [HomeController::class, 'product_details'])->name('product.details');
Route::get('/products', [HomeController::class, 'products']);

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::post('/add-cart/{id}', [HomeController::class, 'add_cart'])->name('cart.add');
    Route::get('/show-cart', [HomeController::class, 'show_cart']);
    Route::get('/remove-cart/{id}', [HomeController::class, 'remove_cart'])->name('cart.remove');
    Route::get('/cash-order', [HomeController::class, 'cash_order']);
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('redirect', [HomeController::class, 'redirect'])->name('admin.redirect');
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // Added dashboard route with name
    
    // Product Management
    Route::get('/show-product', [AdminController::class, 'show_product'])->name('admin.products');
    Route::get('/view-product', [AdminController::class, 'view_product'])->name('admin.add-product');
    Route::post('/add-product', [AdminController::class, 'add_product'])->name('admin.add-product.store');
    Route::get('/delete-product/{id}', [AdminController::class, 'delete_product'])->name('admin.product.delete');
    Route::get('/update-product/{id}', [AdminController::class, 'update_product'])->name('admin.product.update');
    Route::post('/update-product-confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('admin.product.update.confirm');
    
    // Category Management
    Route::get('/view-category', [AdminController::class, 'view_category'])->name('admin.categories');
    Route::post('/add-category', [AdminController::class, 'add_category'])->name('admin.category.add');
    Route::delete('/delete-category/{id}', [AdminController::class, 'delete_category'])->name('admin.category.delete');
    
    // Static Blocks
    Route::get('static-blocks/create', [StaticBlockController::class, 'create'])->name('static-blocks.create');
    Route::post('static-blocks', [StaticBlockController::class, 'store'])->name('static-blocks.store');
    Route::delete('static-blocks/{id}', [StaticBlockController::class, 'destroy'])->name('static-blocks.destroy');
});