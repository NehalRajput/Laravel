<?php
use app\resources\views\welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
