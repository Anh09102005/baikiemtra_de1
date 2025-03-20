<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('/food', FoodController::class);
Route::get('/get-products/{category}', [FoodController::class, 'getProducts']);
Route::get('/category/{id}', [FoodController::class, 'categoryFood'])->name('category_food');
Route::get('/food/category/{id}', [FoodController::class, 'category'])->name('food.category');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/food/{food}', [FoodController::class, 'show'])->name('food.show');
Route::get('/search', [FoodController::class, 'search'])->name('food.search');


