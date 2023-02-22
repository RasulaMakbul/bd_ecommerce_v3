<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishlistController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::get('/', [FrontendController::class, 'index'])->name('public.index');
Route::get('/collections', [FrontendController::class, 'categories'])->name('public.categories');
Route::get('/collections/{category_slug}', [FrontendController::class, 'products'])->name('public.products');
Route::get('/collections/{category_slug}/{product_slug}', [FrontendController::class, 'product'])->name('public.product');
Route::get('/new-arrivals', [FrontendController::class, 'newArrivals'])->name('public.newArrivals');
Route::get('/frontend/search', [FrontendController::class, 'searchProduct'])->name('frontend.search');

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('public.wishlist');
    Route::get('cart', [CartController::class, 'index'])->name('public.cart');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('public.checkout');

    Route::get('/order', [OrderController::class, 'index'])->name('public.orderList');
    Route::get('/order/{orderId}', [OrderController::class, 'show'])->name('public.show');
    Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('comment.store');
});
Route::get('thank-you', [FrontendController::class, 'thankYou']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'categories']);
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    // User Controller
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/users/{$id}', [AdminUserController::class, 'show'])->name('users.show');

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
    Route::post('/product-color/{prod_color_id}', [ProductController::class, 'colorStockUpdate']);
    Route::get('/product-color/{prod_color_id}/delete', [ProductController::class, 'deleteColor']);


    // Color
    Route::resource('/color', ColorController::class);


    // Slider
    Route::resource('/slider', SliderController::class);
    Route::get('/slider/inactive/{id}', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::get('/slider/trending/{id}', [SliderController::class, 'trending'])->name('slider.trending');


    // Order
    Route::resource('/order', AdminOrderController::class);
    Route::put('/order/statusUpdate/{id}', [AdminOrderController::class, 'OrderStatusupdate'])->name('order.statusUpdate');
    Route::get('/order/invoice/{id}', [AdminOrderController::class, 'OrderInvoice'])->name('order.invoice');
    Route::get('order/invoice/generate/{id}', [AdminOrderController::class, 'OrderInvoiceGenerate'])->name('order.invoice.generate');


    // Social
    Route::resource('/social', SocialController::class);
    Route::get('/social/inactive/{id}', [SocialController::class, 'inactive'])->name('social.inactive');
    Route::get('/social/active/{id}', [SocialController::class, 'active'])->name('social.active');
});
