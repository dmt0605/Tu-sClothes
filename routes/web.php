<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('productdetail');
Route::get('/product', [ProductController::class, 'product']);
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'checkout'])->middleware('auth');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/thongbao', function () {
    return view('thongbao');
});

Route::get('thankyou', function () {
    return view('thankyou');
});

Route::prefix('api')->group(function () {
    Route::resource('/cart', CartController::class);
    Route::get('/comments/product/{product_id}', [CommentController::class, 'product']);
    Route::resource('/comments', CommentController::class);
});




//Admin !!!!!!!!!!!!!
Route::prefix('admin')->name('admin.')->middleware(Admin::class)->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/product', [AdminController::class, 'product'])->name('product');
    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/add', [AdminController::class, 'productAdd'])->name('add');
        Route::post('/add', [AdminController::class, 'postproductAdd']);
        Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
    });
    Route::get('/order', [AdminController::class, 'order'])->name('order');
    Route::get('/order_detail/{id}', [AdminController::class, 'order_detail'])->name('order_detail');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
});
require __DIR__ . '/auth.php';
