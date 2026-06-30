@extends('layouts.app')

@section('title', 'Create Article Page')

@section('content')
    <h1 class="font-bold" >New Article</h1>

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

        
            <label class="block">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="border p-2 " required>
       

        
            <label class="block">Content</label>
            <textarea name="content" rows="8" class="border p-2" required>{{ old('content') }}</textarea>
        

        
            <label class="block">Image path</label>
            <input type="text" name="image_path" value="{{ old('image_path') }}" class="border p-2">
        

        
            <label class="block">Select categories</label>
            <select name="existing_category" class="border p-2">
                <option value="">-- Select the categories you want --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if(old('existing_category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
       

        
            
        

        
            <input type="checkbox" name="is_premium" id="is_premium"  @if(old('is_premium')) checked @endif>
            <label for="is_premium" class="block">Premium Article</label>
        

        <button type="submit" class="bg-blue-600 text-white px-4 py-2">Opslaan</button>
    </form>

    <form method="POST" action

@endsection