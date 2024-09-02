<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/product-category/{id}',[HomeController::class,'category'])->name('product-category');
Route::get('/product-detail/{id}',[HomeController::class,'product'])->name('product-detail');

Route::resources(['cart'=>CartController::class,]);

Route::get('/cart/delete-product/{rowId}', [CartController::class,'delete'])->name('cart.delete-product');
Route::post('/cart/update-product', [CartController::class,'updateProduct'])->name('cart.update-product');

Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
Route::post('/checkout/new-order', [CheckoutController::class,'newOrder'])->name('checkout.new-order');
Route::get('/complete-order', [CheckoutController::class,'completeOrder'])->name('complete-order');


// Route::get('/wishlist-add/{$id}', [WishlishController::class,'wishlistAdd'])->name('wishlist-add');


Route::get('/login-register', [CustomerAuthController::class,'index'])->name('login-register');
Route::post('/login-check', [CustomerAuthController::class,'loginCheck'])->name('login-check');
Route::post('/new-customer', [CustomerAuthController::class,'newCustomer'])->name('new-customer');
Route::get('/customer-logout', [CustomerAuthController::class,'logout'])->name('customer-logout');

Route::get('/my-dashboard', [CustomerAuthController::class,'myDashboard'])->name('my-dashboard');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('category',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('brand',BrandController::class);
    Route::resource('unite',UniteController::class);
    Route::resource('color',ColorController::class);
    Route::resource('size',SizeController::class);
    Route::resource('product',ProductController::class);
    Route::get('/get-sub-category-by-category',[ProductController::class,'getSubCategoryByCategory'])->name('get-sub-category-by-category');

    Route::get('/manage-order', [OrderController::class,'index'])->name('manage-order');
    Route::get('/order-view/{id}', [OrderController::class,'orderView'])->name('order-view');
    Route::get('/order-edit', [OrderController::class,'orderEdit'])->name('order-edit');
    Route::get('/order-delete', [OrderController::class,'orderDelete'])->name('order-delete');

});

