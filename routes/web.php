<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
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

Route::get('/products/{id_store}/{id_product}', [ProductsController::class, 'show'])->name('store.product');
Route::get('/store/{id}', [StoreController::class, 'show']);
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/search_store', [StoreController::class, 'index'])->name('stores');
Route::get('/', [UserController::class, 'login'])->name('login.page');
Route::post('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
