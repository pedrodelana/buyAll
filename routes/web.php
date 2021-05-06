<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
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

Route::get('/products/{id_store}/{id_product}', [ProductsController::class, 'show']);
Route::get('/store/{id}', [StoreController::class, 'show']);
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/search_store', [StoreController::class, 'index']);

Route::get('/', function () {
    return view('site/search_store');
});

