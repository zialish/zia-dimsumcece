<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewReplyController;
use App\Http\Controllers\UserController;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = DB::table('products')
        ->leftJoin(
            'categories',
            'products.category_id',
            '=',
            'categories.category_id'
        )
        ->select('products.*', 'categories.category_name')
        ->where('products.status', 'Available')
        ->get();

    $reviews = Review::with('product', 'reply')
        ->latest()
        ->get();

    return view('guest.home', compact('products', 'reviews'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::view('/auth', 'guest.login')->name('login');
Route::view('/register', 'guest.register')->name('register');

Route::post('/auth', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/home-welcome', function () {
    return view('guest.home-welcome');
})->name('home');

Route::get('/ulasan', [ReviewController::class, 'create'])
    ->name('reviews.create');

Route::post('/ulasan', [ReviewController::class, 'store'])
    ->name('reviews.store');

Route::get('/admin/balasan-ulasan', [ReviewReplyController::class, 'index'])
    ->name('review-replies.index');

Route::post('/admin/balasan-ulasan/{reviewId}', [ReviewReplyController::class, 'store'])
    ->name('review-replies.store');

Route::put('/admin/balasan-ulasan/{id}', [ReviewReplyController::class, 'update'])
    ->name('review-replies.update');

Route::delete('/admin/balasan-ulasan/{id}', [ReviewReplyController::class, 'destroy'])
    ->name('review-replies.destroy');
