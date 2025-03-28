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
Route::get('/view_category', [AdminController ::class, 'view_category']);


Route::POST('/add_category', [AdminController ::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
Route::get('/view_product', [AdminController ::class, 'view_product']);
Route::post('/add_product', [AdminController ::class, 'add_product']);

Route::get('/show_product', [AdminController ::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController ::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

//now we are doing the update part
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);



});

Route::get('/product_details/{id}', [HomeController ::class, 'product_details']);
Route::Post('/add_cart/{id}', [HomeController ::class, 'add_cart']);

Route::get('/show_cart', [HomeController ::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController ::class, 'remove_cart']);

Route::get('/cash_order', [HomeController ::class, 'cash_order']);
//Route::get('/stripe/{totalprice}', [HomeController ::class, 'stripe']);
//Route::Post('stripe', [HomeController ::class, 'stripePost'])->name('stripe.post');