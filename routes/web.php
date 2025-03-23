<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;    
use App\Http\Controllers\AdminController;

route::get('/',[HomeController ::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

  
Route::prefix('admin')->group(function () {
Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view-category', [AdminController::class, 'view_category']);
Route::post('/add-category', [AdminController::class, 'add_category']);
Route::get('/delete-category/{id}', [AdminController::class, 'delete_category'])->name('delete-category');
Route::get('/view-product', [AdminController::class, 'view_product']);
Route::post('/add-product', [AdminController::class, 'add_product']);
Route::get('/show-product', [AdminController::class, 'show_product']);
Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update-product/{id}', [AdminController::class, 'update_product']);
Route::post('/update-product-confirm/{id}', [AdminController::class, 'update_product_confirm']);
});

Route::get('/product-details/{id}', [HomeController::class, 'product_details']);
Route::post('/add-cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show-cart', [HomeController::class, 'show_cart']);
Route::get('/remove-cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash-order', [HomeController::class, 'cash_order']);
//Route::get('/stripe/{totalprice}', [HomeController ::class, 'stripe']);
//Route::Post('stripe', [HomeController ::class, 'stripePost'])->name('stripe.post');