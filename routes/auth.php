<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('login',[AuthController::class,'get_login'])->name('login');
Route::get('register',[AuthController::class,'get_register'])->name('register');