<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:5|max:255'
        ]);

        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->article_id = $article->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->back();

    }
}
