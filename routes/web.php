<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserController::class, 'signOut'])->name('signout');

Route::get('products', [ProductController::class,'index'])->name('products');
Route::get('categories', [CategoryController::class,'index']);
Route::get('popular_categories', [CategoryController::class,'indexPopular']);
Route::get("search",[ProductController::class,'search']);



Route::middleware(['auth'])->group(function () {
    Route::post("add_to_cart",[CartController::class,'addToCart']);
    Route::get('carts', [CartController::class,'index']);
    Route::get("removecart/{id}",[CartController::class,'removeCart']);

    Route::post('add_to_review', [ReviewController::class, 'add'])->name('add.review');
    Route::post('save_to_review/{product_id}', [ReviewController::class, 'save'])->name('save.review');
});
