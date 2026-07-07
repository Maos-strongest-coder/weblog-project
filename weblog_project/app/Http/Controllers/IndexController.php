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

        $selectedCategories = $request->input('categories', []);

        $articlesQuery = Article::with(['categories'])->orderBy('created_at', 'desc');
        
        if(!empty($selectedCategories)) {
            $articlesQuery->WhereHas('categories', function ($query) use ($selectedCategories) {
                $query->whereIn('categories.id', $selectedCategories);
            });
        } 

        $articles = $articlesQuery->get();

        return view('articles.index', compact('articles', 'categories', 'selectedCategories' ));
    }

    
}

