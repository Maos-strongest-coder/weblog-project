<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;




Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/create', [CreateController::class, 'create'])->name('create')->middleware('auth');
Route::post('/create', [CreateController::class, 'store'])->name('create.store')->middleware('auth');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

route::post('/logout', [LoginController::class, 'logout'])->name('logout');

