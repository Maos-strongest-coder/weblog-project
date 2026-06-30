<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticle(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function myArticles()
    {
         $articles = auth()->user()->articles()->latest()->get();

        return view('articles.my', compact('articles'));
    }
}
