<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\frontend\FrontController::class,'index'])->name('home.news');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('news', NewsController::class)->middleware('auth');
Route::get('/detail/news/{slug}',[\App\Http\Controllers\frontend\FrontController::class,'detailNews'])->name('detailNews');
Route::get('/detail/category/{slug}',[\App\Http\Controllers\frontend\FrontController::class, 'detailCategory'])->name('detailCategory');