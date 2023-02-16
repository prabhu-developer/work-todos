<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth_user')->group(function() {
    Route::get('login',[AuthController::class,'get_login'])->name('login');
    Route::get('register',[AuthController::class,'get_register'])->name('register');
    Route::post('login',[AuthController::class,'post_login'])->name('login');
    Route::post('register',[AuthController::class,'post_register'])->name('register');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
});