@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        @include('partials.article')
    </div>
    <br>
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">comments</h2>
        
        <form method="POST" action="{{ route('comments.store', $article->id) }}">
            @csrf
            <textarea id="comment" name="content" rows="6"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Write a comment..." required></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2">Post comment</button>
        </form>

        @if($article->comments->isEmpty())
            <p class="text-gray-600">No comments yet.</p>  
        @else 
            <div class="space-y-6">
                @foreach($article->comments as $comment)
                    <div class="bg-white rounded-lg  p-6">
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <span class="text-gray-600 text-sm">by <strong>{{ $comment->user->name }}</strong> on <strong>{{ $comment->created_at->format('F j, Y, H:i') }}</strong></span>
                        
                    </div>
                    
                @endforeach
            </div>
        @endif
    </div>


@endsection
