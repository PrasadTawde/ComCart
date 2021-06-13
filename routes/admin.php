<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubcategoriesController;
use App\Http\Controllers\Admin\SubSubCategoriesController;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::get('/admin', function () {
		return view('admin.dashboard');
	})->name('admin');
	
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
	
	
});