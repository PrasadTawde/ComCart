<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;


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


Route::get('/profile/{id}', [UserProfileController::class,'profile']);


//update user data
Route::get('profile/edit/{id}',[UserProfileController::class,'show']);
Route::post('edit/{id}',[UserProfileController::class,'update']);