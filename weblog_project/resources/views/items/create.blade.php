@extends('layouts.app')

@section('title', 'Create Article Page')

@section('content')
    <h1>New Article</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('create.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Content</label>
            <textarea name="content" rows="8" class="border p-2 w-full" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block">Image path</label>
            <input type="text" name="image_path" value="{{ old('image_path') }}" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block">Select categories</label>
            <select name="existing_category" class="border p-2 w-full">
                <option value="">-- Select the categories you want --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('existing_category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block">Or add new categories</label>
            <input type="text" name="new_category" value="{{ old('new_category') }}" class="border p-2 w-full" placeholder="new category">
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="is_premium" id="is_premium" class="mr-2" @if(old('is_premium')) checked @endif>
            <label for="is_premium" class="block">Premium Article</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2">Opslaan</button>
    </form>
@endsection