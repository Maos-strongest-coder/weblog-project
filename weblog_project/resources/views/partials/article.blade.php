<div class="container mx-auto px-4 py-8 max-w-4xl">
    <article class="bg-white rounded-lg  p-6">
        <div class="flex flex-col">
            @if($article->is_premium)
            <div class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full w-max">
                Premium
            </div>
            @endif

            @if(request()->routeIs('articles.index') || request()->routeIs('articles.my'))
            <a href="{{ route('articles.show', $article->id) }}" class="text-xl font-bold text-blue-600 hover:text-blue-800 mb-2">
                {{ $article->title }}
            </a>
            @else
            <h2 class="text-xl font-bold text-gray-900 mb-2">
                {{ $article->title }}
            </h2>
            @endif

            @if($article->image_path)
            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}" class="w-full rounded-lg">
            @endif

            <p class="text-gray-500 text-sm mb-3">Posted on <strong>{{ $article->created_at->format('F j, Y') }}</strong> by <strong>{{ $article->user->name }}</strong></p>

            @if(request()->routeIs('articles.show'))
            <p class="text-gray-700">
                {{ $article->content }}
            </p>
            @else
            <p class="text-gray-700 line-clamp-2">
                {{ Str::limit($article->content, 150) }}
            </p>
            @endif



            @if(request()->routeIs('articles.index') || request()->routeIs('articles.my'))
            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-3 font-medium">
                Read More ->
            </a>
            @else
            <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-3 font-medium">
                <- Back to overview
                    </a>
                    @endif



                    @if ($article->categories->isNotEmpty())
                    <div class="flex flex-wrap gap-2 text-gray-600">
                        @foreach($article->categories as $category)
                        <p>#{{$category->name}}</p>
                        @endforeach
                    </div>
                    @endif

                    <div class="flex gap-2 mt-4">
                        @if(request()->routeIs('articles.my') || (request()->routeIs('articles.show') && auth()->check() && auth()->user()->id === $article->user_id))


                        <a href="{{ route('articles.edit', $article->id) }}" class="bg-yellow-500 text-white px-4 py-2">Edit</a>
                        <form method="POST" action="{{ route('articles.destroy', $article->id) }}" onsubmit="return confirm('Are you sure you want to delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2">Delete</button>
                        </form>
                        @endif
                    </div>


    </article>
</div>