<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    // dashboard

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    // category
    Route::resource('/category', CategoryController::class);
    Route::get('/category/active/{id}', [CategoryController::class, 'active'])->name('category.active');
    Route::get('/category/inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');



    // brand
    // Route::get('/brand', App\Http\Livewire\Admin\Brand\index::class)->name('brand.index');
    Route::resource('/brand', BrandController::class);
    Route::get('/brand/active/{id}', [BrandController::class, 'active'])->name('brand.active');
    Route::get('/brand/inactive/{id}', [BrandController::class, 'inactive'])->name('brand.inactive');




    // product
    Route::resource('/product', ProductController::class);
    Route::get('/product/active/{id}', [ProductController::class, 'active'])->name('product.active');
    Route::get('/product/inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('/product/trending/{id}', [ProductController::class, 'trending'])->name('product.trending');
    Route::get('/product/notTrending/{id}', [ProductController::class, 'notTrending'])->name('product.notTrending');


    // Color
    Route::resource('/color', ColorController::class);
});
