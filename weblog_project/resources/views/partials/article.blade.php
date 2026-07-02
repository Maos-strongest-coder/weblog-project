<div class="container mx-auto px-4 py-8 max-w-4xl">
            <article class="bg-white rounded-lg  p-6">
                <div class="flex flex-col">
                @if($article->is_premium)
                    <div class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full w-max">
                        Premium
                    </div>
                @endif
                
                @if(request()->routeIs('index') || request()->routeIs('articles.my'))
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

                <p class="text-gray-500 text-sm mb-3">Posted on <strong>{{ $article->created_at->format('F j, Y') }}</strong></p>

                @if(request()->routeIs('articles.show'))
                    <p class="text-gray-700">
                        {{ $article->content }}
                    </p>
                @else
                    <p class="text-gray-700 line-clamp-2">
                        {{ Str::limit($article->content, 150) }}
                    </p>
                @endif
                
                
                
                @if(request()->routeIs('index') || request()->routeIs('articles.my'))
                    <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-3 font-medium">
                        Read More ->
                    </a>
                @else
                    <a href="{{ route('index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-3 font-medium">
                        <- Back to overview
                    </a>
                @endif
                </div>

                @if ($article->categories->isNotEmpty())
                    @foreach($article->categories as $category)
                    <p>#{{$category}}</p>
                    @endforeach
                @endif

            </article>
        </div>