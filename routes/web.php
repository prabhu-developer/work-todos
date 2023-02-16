<?php

include('auth.php');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');
    Route::resource('/todo', TodoController::class);
    Route::post('/todo/update-status/{id?}', [TodoController::class,'update_status']);
});