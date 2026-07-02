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
            
                <p class="block">Select categories:</p>
                    @foreach ($categories as $category)
                        
                        <label>{{ $category['name'] }}</label>
                        <input type="checkbox"><br> 
                        
                    @endforeach
        
                @if(auth()->user()->is_premium)
                <legend>Select exlusivity:</legend>
  <div>
    <input type="radio" id="premium" name="is_premium" value="1" checked />
    <label for="premium">Only for premium users</label>
  </div>

  <div>
    <input type="radio" id="peasant" name="is_premium" value="0" />
    <label for="peasant">Everyone can read this article</label>
</div>
</fieldset>
                @endif
                <fieldset>
  
            

            <button type="submit" class="bg-blue-600 text-white px-4 py-2">Post Article</button>
        </form>
    

    <form method="POST" action="{{ route('categories.store') }}" class="w-64 pt-7">
            @csrf

            <input type="text" name="name" class="border p-2" placeholder="Or add a new category." >
            <button type="submit" class="bg-blue-600 text-white px-4 py-2">Add Category</button>
    </form>

@endsection