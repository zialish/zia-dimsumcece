<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $products = Product::where('status', 'Available')->get();

    return view('guest.home', compact('products'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::view('/auth', 'guest.login')->name('login');
Route::view('/register', 'guest.register')->name('register');


Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);

Route::post('/auth', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

    Route::get('/home', function () {
    return redirect('/');
});

