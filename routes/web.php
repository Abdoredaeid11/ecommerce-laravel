<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
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


    #################USERRRRR########################

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


  

    Route::group(['middleware' => ['auth','admin']], function () {

    #################Adminnnnnn-Dashboard########################

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admindashboard');

        
    #################Adminnnnnn-Category########################
    Route::get('/admin/category/index', [AdminCategoryController::class, 'index'])->name('dashboard');
    Route::get('/admin/category/create', [AdminCategoryController::class, 'create']);
    Route::post('/admin/category/store', [AdminCategoryController::class, 'store']);
    Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit']);
    Route::put('/admin/category/update/{id}', [AdminCategoryController::class, 'update']);
    Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'destroy']);



     #################Adminnnnnn-Product########################
     Route::get('/admin/product/index/{id}', [AdminProductController::class, 'index'])->name('product.index');
     Route::get('/admin/product/create/{id}', [AdminProductController::class, 'create']);
     Route::post('/admin/product/store', [AdminProductController::class, 'store']);
     Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'edit']);
     Route::put('/admin/product/update/{id}', [AdminProductController::class, 'update']);
     Route::get('/admin/product/delete/{id}', [AdminProductController::class, 'destroy']);
 

    });