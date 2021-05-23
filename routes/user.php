<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\UserProfileController;

Route::group(['middleware' => ['auth', 'role:user']], function () {

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
});