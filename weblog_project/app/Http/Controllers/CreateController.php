<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CreateController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('articles.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_path' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
            'is_premium' => 'nullable|boolean',
        ]);

        if (empty($validated['existing_category']) && empty(trim($validated['new_category'] ?? ''))) {
            return back()->withErrors(['category' => 'Choose an existing category or make a new one.'])->withInput();
        }

        if (!empty(trim($validated['new_category'] ?? ''))) {
            $category = Category::firstOrCreate(['name' => trim($validated['new_category'])]);
        } else {
            $category = Category::find($validated['existing_category']);
        }

        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->image_path = $validated['image_path'] ?? '';
        $article->is_premium = $validated['is_premium'] ?? false;
        $article->save();
        $article->categories()->attach($category->id);
        

        return redirect()->route('articles.show', $article->id);
    }
}
