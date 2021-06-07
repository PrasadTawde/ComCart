<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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


Route::get('/shop', [MenuController::class, 'index'])->name('shop');
Route::get('/category/{category}', [MenuController::class, 'category'])->name('category');
Route::get('/product/{id}', [ShopController::class, 'index'])->name('product');

Route::get('fetch_image_1/{id}', [ShopController::class, 'fetch_image_1'])->name('fetch_image_1');
Route::get('fetch_image_2/{id}', [ShopController::class, 'fetch_image_2'])->name('fetch_image_2');
