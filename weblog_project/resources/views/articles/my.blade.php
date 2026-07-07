@extends('layouts.app')

@section('title', 'My Articles')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-gray-800">My Articles</h1>
@if($articles->isEmpty())
    <p>you have not yet written an article.</p>
@else
<div class="container mx-auto px-4 py-8 max-w-4xl">
    
    @foreach($articles as $article)
        @include('partials.article')
    @endforeach
</div>
@endif

@endsection