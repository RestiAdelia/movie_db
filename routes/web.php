<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movie', MovieController::class);
Route::resource('category', CategoryController::class);
