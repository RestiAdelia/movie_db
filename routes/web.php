<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('movie', MovieController::class)->middleware('auth');

Route::resource('movie', MovieController::class)
    ->only(['edit', 'update', 'destroy','detail'])
    ->middleware(['auth', RoleAdmin::class]);

Route::get('home', [MovieController::class, 'homepage'])->name('home');

Route::resource('category', CategoryController::class);
Route::get('/movie/{id}/{slug}',[MovieController::class, 'detail'])->middleware('auth');

Route::get('login',[AuthController::class,'loginform'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);



