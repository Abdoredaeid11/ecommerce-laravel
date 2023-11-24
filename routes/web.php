<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;

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
    Route::post('/order/update/{product_id}', [OrderController::class, 'update']);
});


    #################Adminnnnnn-Category########################
    Route::get('/admin/category/index', [AdminCategoryController::class, 'index']);
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create']);
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store']);
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit']);
    Route::put('/admin/category/update/{id}', [AdminCategoryController::class, 'update']);



    
    #################Adminnnnnn-Product########################
    Route::get('/admin/product/index/{id}', [AdminProductController::class, 'index']);




