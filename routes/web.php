<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    $products = Product::where('status', 'Available')
        ->get();

    return view('guest.home', compact('products'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('customers', CustomerController::class);
