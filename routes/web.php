<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FrontEndController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AddtocartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[FrontEndController::class,'mainHome']);
Route::get('/categoryPage',[FrontEndController::class,'categoryPage']);
Route::get('/categoryProducts/{id}',[FrontEndController::class,'categoryProducts']);
Route::get('/productDetail/{id}',[FrontEndController::class,'productDetail']);
Route::get('productList',[FrontEndController::class,'productList']);
Route::post('searchReasult',[FrontEndController::class,'searchReasult']);




Auth::routes();
route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontEndController::class,'index']);
    Route::get('category',[CategoryController::class,'index']);
    Route::get('addcategory',[CategoryController::class,'add']);
    Route::get('editCategory/{id}',[CategoryController::class,'editCategory']);
    Route::post('UpdateCategory',[CategoryController::class,'UpdateCategory']);
    Route::get('DeleteCategory/{id}',[CategoryController::class,'DeleteCategory']);
    Route::post('insertCategory',[CategoryController::class,'insertCategory']);


    Route::get('product',[ProductController::class,'index']);
    Route::get('addproduct',[ProductController::class,'add']);
    Route::post('insertProduct',[ProductController::class,'insertProduct']);
    Route::get('EditProduct/{id}',[ProductController::class,'EditProduct']);
    Route::post('UpdateProduct',[ProductController::class,'UpdateProduct']);
    Route::get('DeleteProduct/{id}',[ProductController::class,'DeleteProduct']);

    Route::get('OrderDetails',[OrderController::class,'OrderDetails']);
    Route::get('admin/viewOrder/{id}',[OrderController::class,'viewOrder']);
    Route::put('UpdateStatus/{id}',[OrderController::class,'UpdateStatus']);
    Route::get('orderHistory',[OrderController::class,'orderHistory']);

    Route::get('UserDetails',[UserController::class,'UserDetails']);
    Route::get('viewUser/{id}',[UserController::class,'viewUser']);


});
Route::post('/addToCart',[AddtocartController::class,'addToCart']);
Route::post('/deleteCart',[AddtocartController::class,'deleteCart']);
Route::post('/changeQty',[AddtocartController::class,'changeQty']);
Route::post('/addToWishList',[WishlistController::class,'addToWishList']);
Route::post('/deleteWishlist',[WishlistController::class,'deleteWishlist']);



Route::post('addRating',[RatingController ::class,'addRating']);

Route::middleware(['auth'])->group(function(){
    Route::get('/cartDetail',[FrontEndController::class,'cartDetail']);
    Route::get('/checkoutDetail',[FrontEndController::class,'checkoutDetail']);
    Route::post('/plaOrder',[CheckoutController::class,'plaOrder']);
    Route::get('/myorders',[CheckoutController::class,'myorders']);
    Route::get('viewOrder/{id}',[CheckoutController::class,'viewOrder']);
    Route::get('wishlist',[WishlistController::class,'wishlist']);
    Route::post('proceedToPay',[PaymentController::class,'proceedToPay']);
    // Route::get('StarratingCount',[RatingController ::class,'StarratingCount']);
    Route::post('addComment',[CommentController::class,'addComment']);
    Route::post('deleteComment',[CommentController::class,'deleteComment']);
    Route::put('EditComment',[CommentController::class,'EditComment']);

});

Route::get('wishlistCount',[WishlistController::class,'wishlistCount']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
