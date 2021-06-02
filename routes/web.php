<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ResellProductController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';

Route::get('/status', function () {
    return view('status');
});



Route::get('/selectCategory',function(){
    return view('/seller/selectCategory');
});

Route::get('/subCategories',function(){
    return view('seller/subcategories');
});

Route::resource('Categories','CategoryController');

Route::resource('sub_categories','sub_categoryController');

Route::resource('resell_products','ResellProductController');

Route::get('/selectCategory',[CategoryController::class,'index'])->name('/selectCategory');

Route::get('subCategories/{id}/{category}',[SubCategoryController::class,'show'])->name('/SubCategories/?{id}&{category}');

Route::post('productAdded',[ResellProductController::class,'store'])->name('Add');