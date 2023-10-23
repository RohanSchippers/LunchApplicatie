<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SandwichController;

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
    return view('welcome');
});

Route::get('/sandwiches', function () {
    return view('sandwich');
});

Route::get('/sandwiches', [App\Http\Controllers\SandwichController::class, 'index'])->name('sandwiches.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\SandwichController::class, 'search'])->name('search');

Route::get('/category/{category}', [App\Http\Controllers\SandwichController::class, 'showByCategory'])->name('products.category');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::any('/cart/update', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
