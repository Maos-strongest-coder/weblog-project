<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;




Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/create', [CreateController::class, 'create'])->name('create');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

