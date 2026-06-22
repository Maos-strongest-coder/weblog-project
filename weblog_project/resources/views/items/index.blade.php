@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Latest Articles</h2>
        
        @if($articles->isEmpty())
            <p class="text-gray-600">No articles yet.</p>
        @else

            <div class="space-y-6">
                @foreach($articles as $article)
                    
                    <article class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                        @if($article->is_premium)
                                <span class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full" width="auto">
                                    Premium
                                </span>
                        @endif
                        <div class="flex flex-col">
                            <a href="{{ route('articles.show', $article->id) }}" class="text-xl font-bold text-blue-600 hover:text-blue-800 mb-2">
                                {{ $article->title }}
                            </a>
                            @if($article->image_path)
                                
                                <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="w-full rounded-lg">
                                
                            @endif
                            <p class="text-gray-500 text-sm mb-3">
                                Posted on {{ $article->created_at->format('F j, Y') }}
                            </p>
                            @if($article->content)
                                <p class="text-gray-700 line-clamp-2">
                                    {{ Str::limit($article->content, 150) }}
                                </p>
                            @endif
                            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-3 font-medium">
                                Read More
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
@endsection

