<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubcategoriesController;



Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::get('/admin', function () {
		return view('admin.dashboard');
	})->name('admin');
});


//display-categories
Route::get('/categories', [CategoriesController::class,'show'])->name('categories');

//insert-category
Route::get('/insert-categories', function () {
	return view('admin.insert-categories');
});
Route::post('/insert-categories',[CategoriesController::class,'store'])->name('insert-categories');


//delete-category
Route::get('/delete-categories/{id}',[CategoriesController::class,'destroy'])->name('delete-categories');

//update-category
Route::get('/update-categories/{id}',[CategoriesController::class,'edit'])->name('update-categories');
Route::post('/update-categories/{id}',[CategoriesController::class,'update'])->name('update-categories');


//Sub-categories
//select category
Route::get('/select-category', [subcategoriesController::class,'show'])->name('select-category');


//insert-subcategories
Route::get('/insert-subcategories', [subcategoriesController::class,'show'])->name('/insert-subcategories');
Route::post('/insert-subcategories',[subcategoriesController::class,'store'])->name('insert-subcategories');

//display-sub-categories
Route::get('/subcategories', [subcategoriesController::class,'index'])->name('subcategories');

//delete-sub-subcategories
Route::get('/delete-subcategories/{id}',[subcategoriesController::class,'destroy'])->name('delete-subcategories');

//update-subcategories
Route::get('/update-subcategories/{id}',[subcategoriesController::class,'edit'])->name('update-subcategories');

Route::post('/update-subcategories/{id}',[subcategoriesController::class,'update'])->name('update-subcategories');