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
                @include('partials.article')
                @endforeach
            </div>
        @endif
    </div>
@endsection

