<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(request $request)
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $articlesCollection = Article::with(['categories'])->orderBy('created_at', 'desc')->get();
        
        $selectedCategories = $request->input('categories', []);

        if(!empty($selectedCategories)) {
            $articles = $articlesCollection->filter(function ($article) use ($selectedCategories) {
                return $article->categories->pluck('id')->intersect($selectedCategories)->isNotEmpty();
            });
        } else {
            $articles = $articlesCollection;
        }


        return view('articles.index', compact('articles', 'categories', 'selectedCategories' ));
    }

    
}

