<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\resell_productController;
use App\Http\Controllers\sub_categoryController;

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

Route::get('/status', function () {
    return view('status');

});



Route::get('/addProduct',function(){
    return view('/seller/addProduct');
});

Route::get('/subCategories',function(){
    return view('seller/subcategories');
});

Route::group(['middleware' => ['web']], function () {
	//routes here
    Route::resource('categories','categoryController');
    
	Route::get('/addProduct',[categoryController::class,'index'])->name('/addProduct');

    // Route::resource('sub_categories','sub_categoryController');
    Route::get('subCategories/{id}/{category}',[sub_categoryController::class,'show'])->name('/subCategories/?{id}&{category}');
    // Route::get('/addProduct',[resell_productController::class,'store'])->name('/addProduct');
});