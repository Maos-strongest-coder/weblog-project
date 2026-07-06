<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    public function showArticle(Article $article)
    {
        if($article->is_premium){
            if(!Auth::check()){
                return redirect()->route('login')->withErrors(['error' => 'You must be logged in to view premium articles.']);
            } else {
                $user = Auth::user();
                if($article->is_premium && !$user->is_premium && $article->user_id !== $user->id){

                    return redirect()->route('premium')->withErrors(['error' => 'You must be a premium user to view this article.']);
                }
            }
        }
        

        return view('articles.show', compact('article'));
    }

    public function myArticles()
    {
         $articles = Auth::user()->articles()->latest()->get();

        return view('articles.my', compact('articles'));
    }

    

    public function destroy(Article $article)
    {
        if (Auth::id() !== $article->user_id) {
            return redirect()->route('articles.my')->withErrors(['error' => 'You are not authorized to delete this article.']);
        }

        $article->delete();

        return redirect()->route('articles.my');
    }
}
