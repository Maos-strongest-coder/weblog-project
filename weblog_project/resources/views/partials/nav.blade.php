<nav class="bg-gray-800">
    
                <div class="ml-10 flex items-baseline space-x-4">
                    
                    <a href="{{ route('index') }}" class="<?php if ($_SERVER['REQUEST_URI'] === '/') echo 'bg-black text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">Home Page</a>
                    <a href="{{ route('create') }}" class="<?php if ($_SERVER['REQUEST_URI'] === '/create') echo 'bg-black text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">@auth Create an Article @endauth</a>
                    <a href="{{ route('login')  }}" class="<?php if ($_SERVER['REQUEST_URI'] === '/login') echo 'bg-black text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">@guest Log in @endguest</a>
                    <a href="{{ route('articles.my') }}"  class="<?php if ($_SERVER['REQUEST_URI'] === '/articles/my') echo 'bg-black text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">My articles</a>
                    
                    <a   href="{{ route('premium') }}"  class="<?php if ($_SERVER['REQUEST_URI'] === '/premium') echo 'bg-black text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">Premium</a>
                </div>
           
</nav>

@auth
<form method="POST" action="{{ route('logout') }}">
    @csrf
<button type="submit" class="bg-red-600 text-white px-4 py-2">Log out</button>
</form>
@endauth




  

