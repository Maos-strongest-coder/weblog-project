@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <article class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $article->title }}</h1>
            
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-200">
                <span class="text-gray-600 text-sm">
                    Posted on <strong>{{ $article->created_at->format('F j, Y') }}</strong>
                </span>
                @if($article->user)
                    <span class="text-gray-600 text-sm">
                        by <strong>{{ $article->user->name }}</strong>
                    </span>
                @endif
                @if($article->is_premium)
                    <span class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full" width="auto">
                        Premium
                    </span>
                @endif
            </div>

            @if($article->image_path)
                <div class="mb-8">
                    <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="w-full rounded-lg">
                </div>
            @endif

            <div class="prose max-w-none mb-8">
                {{ $article->content }}
            </div>

            <div class="pt-6 border-t border-gray-200">
                <a href="{{ route('index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    <- Back to Articles
                </a>
            </div>
        </article>
    </div>
    <br>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">comments</h2>
        @if($article->comments->isEmpty())
            <p class="text-gray-600">No comments yet.</p>  
        @else 
            <div class="space-y-6">
                @foreach($article->comments as $comment)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <span class="text-gray-600 text-sm">by {{ $comment->user->name }} on {{ $comment->created_at->format('F j, Y') }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


@endsection
