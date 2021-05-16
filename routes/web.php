<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Models\Products;
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

Route::get('/products/{id_store}/{id_product}', [ProductsController::class, 'show'])->name('store.product')->middleware('auth');
Route::get('/store/{id}', [StoreController::class, 'show']);
Route::get('/products', [ProductsController::class, 'index'])->name('products');
Route::get('/search_store', [StoreController::class, 'index'])->name('stores')->middleware('auth');
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth.user');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
Route::delete('/products/delete/{id}', [ProductsController::class, 'destroy'])->name('product.destroy');
Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
