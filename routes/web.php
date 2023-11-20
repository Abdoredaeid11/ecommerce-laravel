<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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





#################HomePage########################

Auth::routes();



Route::group(['middleware' => ['auth']], function() {

    #################Category########################
    Route::get('/', [CategoryController::class, 'index']);


    #################Producs########################
    Route::get('/products/{id}', [ProductController::class, 'index'])->name('products');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    #################Cart########################
    Route::get('/order/{product_id}', [OrderController::class, 'store']);
    Route::get('/cart', [OrderController::class, 'index']);
    Route::get('/cart/delete/{id}', [OrderController::class, 'delete'])->name('delete.order');



});

