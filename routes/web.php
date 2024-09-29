<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('news', NewsController::class)->middleware('auth');