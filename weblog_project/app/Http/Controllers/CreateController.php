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
            'categories' => 'nullable|array|min:1',
            'categories.*' => 'integer|exists:categories,id',
            'is_premium' => 'nullable|boolean',
        ]);

        
        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $validated['title'];
        $article->content = $validated['content'];
        $article->image_path = $validated['image_path'] ?? '';
        $article->is_premium = $validated['is_premium'] ?? false;
        $article->save();

        if (!empty($validated['categories'])) {
            $article->categories()->attach($validated['categories']);
        }
        
        return redirect()->route('articles.show', $article->id);
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name|max:255',
        ],
        [
            'name.required' => 'A category without a name is not so useful, buddy',
            'name.unique' => 'This category already exists, buddy'
        ]);

        Category::create([
            'name' => trim($validated['name'])
        ]);

        return back();
    }
}
