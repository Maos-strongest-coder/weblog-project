@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <div>
        <h2>select categories to filter</h2>
        <form action="{{ route('articles.index') }}" method="GET" class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
           
            <div class="flex flex-wrap gap-4 mb-4">
                @foreach($categories as $category)
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                        <span class="text-sm">#{{ $category->name }}</span>
                    </label>
                @endforeach
            </div>
            
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2">
                    Filter articles
                </button>
                @if(!empty($selectedCategories))
                    <a href="{{ route('articles.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2">
                        Clear filters
                    </a>
                @endif
            </div>
        </form>
    </div>
        
    </div>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Latest Articles</h2>
        
        @if($articles->isEmpty())
            <p class="text-gray-600">No articles yet.</p>
        @else

            <div class="space-y-6">
                @foreach($articles as $article)
                    @include('partials.article')
                @endforeach
            </div>
        @endif
    </div>
@endsection

