<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\UserProfileController;

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
	Route::get('/sell', [ProductController::class, 'index'])->name('product');
	Route::get('/sell/{id}/{category}',[ProductController::class,'create'])->name('/sell/?{id}&{category}');
	Route::post('productAdded',[ProductController::class,'store'])->name('Add');

	//shopping cart 
	Route::get('/cart', [ShoppingCartController::class, 'index'])->name('cart');
	Route::get('/add-to-cart/{id}', [ShoppingCartController::class, 'store'])->name('add-to-cart');
	Route::get('/remove-from-cart/{id}', [ShoppingCartController::class, 'destroy'])->name('remove-from-cart');
	Route::get('/clear-cart', [ShoppingCartController::class, 'clear'])->name('clear-cart');

});