<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\UserVerificationsController;


Route::group(['middleware' => ['auth', 'role:user']], function () {

	//manage-address
	Route::get('/address', [AddressController::class, 'index'])->name('address');
	Route::get('/address-add', [AddressController::class, 'create'])->name('address-add');
	Route::post('/address-add', [AddressController::class, 'store'])->name('address-add');
	Route::get('/address-edit/{id}', [AddressController::class, 'edit'])->name('address-edit');
	Route::post('/address-edit/{id}', [AddressController::class, 'update'])->name('address-edit');
	Route::get('/address-delete/{id}', [AddressController::class, 'destroy'])->name('address-edit');

	//profile
	Route::get('/profile', [UserProfileController::class,'profile'])->name('profile');
	Route::get('/profile-edit',[UserProfileController::class,'show'])->name('profile-edit');
	Route::post('/profile-edit',[UserProfileController::class,'update'])->name('edit');

	//sell
	Route::get('/sell',[ProductController::class,'create'])->name('/sell');
	Route::post('productAdded',[ProductController::class,'store'])->name('Add');
	Route::get('/my-products',[ProductController::class,'index'])->name('myProduct');
	Route::get('edit/{id}',[ProductController::class,'edit']);
	Route::post('/update/{id}',[ProductController::class,'update']);
	Route::get('/delete/{id}',[ProductController::class,'destroy']);

	//search
	Route::get('search',[ProductController::class,'search'])->name('search');
	// Route::get('sort',[ProductController::class,'sort'])->name('sort');

	//shopping cart 
	Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart');
	Route::get('/add-to-cart/{id}', [ShoppingCartController::class, 'store'])->name('add-to-cart');
	Route::get('/remove-from-cart/{id}', [ShoppingCartController::class, 'destroy'])->name('remove-from-cart');
	Route::get('/clear-cart', [ShoppingCartController::class, 'clear'])->name('clear-cart');

	//payment
	Route::get('/checkout', [ShoppingCartController::class, 'checkout'])->name('checkout');
	Route::get('/payment', [RazorpayController::class, 'payment'])->name('payment');
	Route::post('/payment', [RazorpayController::class, 'initiate'])->name('initiate');
	Route::post('/payment-complete', [RazorpayController::class, 'complete'])->name('complete');


//user verification
Route::get('/user-verification', [UserVerificationsController::class, 'create']);
Route::post('/user-verification',[UserVerificationsController::class,'store'])->name('user-verification');

// auction
Route::get('/add-auction-product',[AuctionController::class,'create']);
Route::post('/auction-product-added',[AuctionController::class,'store'])->name('addAuction');
Route::get('/auction-products',[AuctionController::class,'index']);
Route::get('/auction-product-details/{id}',[AuctionController::class,'show'])->name('auction-product-details');
Route::post('/bid/{id}/{current_bid_amount}',[AuctionController::class,'bid'])->name('bid');

});



