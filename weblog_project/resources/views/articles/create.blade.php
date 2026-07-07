@extends('layouts.app')

@section('title', 'Create Article Page')

@section('content')
<h1 class="font-bold">New Article</h1>




<form method="POST" action="{{ route('create.store') }}">
    @csrf

    <label class="block font-medium">Title</label>
    <input type="text" name="title" value="{{ old('title') }}" class="border p-2 " required>

    <label class="block font-medium">Content</label>
    <textarea name="content" rows="8" class="border p-2" required>{{ old('content') }}</textarea>

    <label class="block font-medium ">Image path</label>
    <input type="text" name="image_path" value="{{ old('image_path') }}" class="border p-2">

    <fieldset>
        @if(auth()->user()->is_premium)
        <legend class="font-medium">Select exlusivity:</legend>
        <div>
            <input type="radio" id="premium" name="is_premium" value="1" checked />
            <label for="premium">Only for premium users</label>
        </div>

        <div>
            <input type="radio" id="peasant" name="is_premium" value="0" />
            <label for="peasant">Everyone can read this article</label>
        </div>

        @endif
    </fieldset>

    <p class="block font-medium">Select categories:</p>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
        @foreach ($categories as $category)
        <div class="flex items-center gap-2 mb-1">
            <input type="checkbox" name="categories[]" value="{{ $category['id'] }}"><br>
            <label>{{ $category['name'] }}</label>
        </div>
        @endforeach
    </div>






    <button type="submit" class="bg-blue-600 text-white px-4 py-2">Post Article</button>
</form>


<form method="POST" action="{{ route('categories.store') }}" class="w-64 pt-7">
    @csrf

    <input type="text" name="name" class="border p-2" placeholder="Or add a new category.">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2">Add Category</button>
</form>

@endsection