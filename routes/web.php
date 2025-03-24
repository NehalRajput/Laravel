<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;    
use App\Http\Controllers\AdminController;

// Public routes - accessible without login
Route::get('/', [HomeController::class, 'index']);
Route::get('/product-details/{id}', [HomeController::class, 'product_details']);

// User routes - require authentication
Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::post('/add-cart/{id}', [HomeController::class, 'add_cart']);
    Route::get('/show-cart', [HomeController::class, 'show_cart']);
    Route::get('/remove-cart/{id}', [HomeController::class, 'remove_cart']);
    Route::get('/cash-order', [HomeController::class, 'cash_order']);
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
   // Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/adminpage', [HomeController::class, 'adminpage']);
    Route::get('/categories', [AdminController::class, 'view_category'])->name('admin.categories');
    Route::post('/category/add', [AdminController::class, 'add_category'])->name('admin.category.add');
    Route::get('/category/delete/{id}', [AdminController::class, 'delete_category'])->name('admin.category.delete');
    Route::get('/products', [AdminController::class, 'view_product'])->name('admin.products');
    Route::post('/product/add', [AdminController::class, 'add_product'])->name('admin.product.add');
    Route::get('/product/delete/{id}', [AdminController::class, 'delete_product'])->name('admin.product.delete');
    Route::get('/product/edit/{id}', [AdminController::class, 'edit_product'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [AdminController::class, 'update_product'])->name('admin.product.update');
});
//Route::get('/stripe/{totalprice}', [HomeController ::class, 'stripe']);
//Route::Post('stripe', [HomeController ::class, 'stripePost'])->name('stripe.post');
