<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admin', function () {
                return view('admin.dashboard');
        })->name('admin');
});