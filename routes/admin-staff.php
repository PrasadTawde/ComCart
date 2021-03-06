<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductVerificationsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SubcategoriesController;
use App\Http\Controllers\Admin\SubSubCategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\UserVerificationsController;

Route::group(['middleware' => ['auth', 'role:admin|staff']], function () {
	
	//category
	Route::get('/categories', [CategoriesController::class,'show'])->name('categories');
	//insert-category
	Route::get('/categories-insert', [CategoriesController::class, 'create']);
	Route::post('/categories-insert',[CategoriesController::class,'store'])->name('categories-insert');
	//delete-category
	Route::get('/categories-delete/{id}',[CategoriesController::class,'destroy'])->name('categories-delete');
	//update-category
	Route::get('/categories-update/{id}',[CategoriesController::class,'edit'])->name('categories-update');
	Route::post('/categories-update/{id}',[CategoriesController::class,'update'])->name('categories-update');


	//Sub category
	Route::get('/select-category', [subcategoriesController::class,'show'])->name('select-category');
	//insert-subcategories
	Route::get('/subcategories-insert', [subcategoriesController::class,'show'])->name('/subcategories-insert');
	Route::post('/subcategories-insert',[subcategoriesController::class,'store'])->name('subcategories-insert');
	//display-sub-categories
	Route::get('/subcategories', [subcategoriesController::class,'index'])->name('subcategories');
	//delete-sub-subcategories
	Route::get('/subcategories-delete/{id}',[subcategoriesController::class,'destroy'])->name('subcategories-delete');
	//update-subcategories
	Route::get('/subcategories-update/{id}',[subcategoriesController::class,'edit'])->name('subcategories-update');
	Route::post('/subcategories-update/{id}',[subcategoriesController::class,'update'])->name('subcategories-update');	


	//SubSubcategory
	Route::get('/subsubcategories', [SubSubCategoriesController::class,'index'])->name('subsubcategories');
	//insert
	Route::get('/subsubcategories-insert', [SubSubCategoriesController::class,'show'])->name('/subsubcategories-insert');
	Route::post('/subsubcategories-insert', [SubSubCategoriesController::class,'store'])->name('/subsubcategories-insert');
	//delete
	Route::get('/subsubcategories-delete/{id}',[SubSubCategoriesController::class,'destroy'])->name('subsubcategories-delete');
	//delete
	Route::get('/subsubcategories-update/{id}',[SubSubCategoriesController::class,'edit'])->name('subsubcategories-update');
	Route::post('/subsubcategories-update/{id}',[SubSubCategoriesController::class,'update'])->name('subsubcategories-update');

	//user verification for auction
	Route::get('/user-verify', [UserVerificationsController::class, 'index'])->name('user-verify');
	Route::get('/user-verify-update/{id}', [UserVerificationsController::class, 'edit'])->name('user-verify-update');
	Route::post('/user-verify-update/{id}', [UserVerificationsController::class, 'update'])->name('user-verify-update');

	//product verification
	Route::get('/product-verification', [ProductVerificationsController::class, 'show']);
	Route::get('/product-verification-update/{id}', [ProductVerificationsController::class, 'create']);
	Route::post('/product-verification-update/{id}', [ProductVerificationsController::class, 'update'])->name('/product-verification-insert');
	Route::get('/product-verification-delete/{id}',[ProductVerificationsController::class,'destroy'])->name('product-verification');

	//manage orders
	Route::get('/manage-orders', [OrderController::class, 'create']);
	Route::get('/manage-order-update/{id}', [OrderController::class, 'edit'])->name('order-update');
	Route::post('/manage-order-update/{id}', [OrderController::class, 'update'])->name('order-update');

	//manage-accounts
	Route::get('/manage-accounts', [AccountController::class, 'index']);

	
});

//user specific routes for admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
	//admin dashboard
	Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
	
	//manage - staff
	Route::get('/manage-staff', [StaffController::class, 'index'])->name('manage-staff');
	Route::get('/manage-staff-add', [StaffController::class, 'create'])->name('manage-staff-add');
	Route::post('/manage-staff-add', [StaffController::class, 'store'])->name('manage-staff-add');
	Route::get('/manage-staff-remove/{id}', [StaffController::class, 'destroy'])->name('manage-staff-destroy');

});

//user specific routes for staff
Route::group(['middleware' => ['auth', 'role:staff']], function () {
	Route::get('/staff', [DashboardController::class, 'index'])->name('admin');
});