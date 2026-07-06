<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;


class EditController extends Controller
{
    public function show($id)
    {
        $article = Article::with('categories')->findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|string|max:255',
            'categories' => 'nullable|array|min:1',
            'categories.*' => 'integer|exists:categories,id',
            'is_premium' => 'nullable|boolean',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->image_path = $validated['image_path'] ?? '';
        $article->is_premium = $validated['is_premium'] ?? false;
        $article->save();

        if (!empty($validated['categories'])) {
            $article->categories()->sync($validated['categories']);
        } else {
            $article->categories()->detach();
        }

        return redirect()->route('articles.show', $article->id);
    }
}

