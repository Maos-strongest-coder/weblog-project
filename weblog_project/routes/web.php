<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PremiumController;




Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/create', [CreateController::class, 'create'])->name('create')->middleware('auth');
Route::post('/create', [CreateController::class, 'store'])->name('create.store')->middleware('auth');

Route::post('/category', [CreateController::class, 'storeCategory'])->name('categories.store')->middleware('auth');

Route::get('/articles/my', [ArticleController::class, 'myArticles'])->name('articles.my')->middleware('auth');
Route::get('/articles/{article}', [ArticleController::class, 'showArticle'])->name('articles.show');

Route::get('/premium', [PremiumController::class, 'show'])->name('premium')->middleware('auth');
Route::post('/premium', [PremiumController::class, 'toggle'])->name('premium.toggle');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

route::post('/logout', [LoginController::class, 'logout'])->name('logout');

