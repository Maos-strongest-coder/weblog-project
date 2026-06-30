@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        @include('partials.article')
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
