<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', function () {
//     return view('layouts.home');

// Route::get('/home', function () {
//     return view('layouts.template');
// });

Route::resource('movie', MovieController::class);

Route::get('home', [MovieController::class, 'homepage'])->name('home');

Route::resource('category', CategoryController::class);
Route::get('/movie/{id}/{slug}',[MovieController::class, 'detail']);


