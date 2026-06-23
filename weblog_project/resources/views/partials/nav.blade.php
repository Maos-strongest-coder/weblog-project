<nav class="bg-gray-800">
    
                <div class="ml-10 flex items-baseline space-x-4">
                    
                    <a href="{{ route('index') }}" aria-current="page" class="<?php if ($_SERVER['REQUEST_URI'] === '/') echo 'bg-yellow-1200 text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">Home Page</a>
                    <a href="{{ route('create') }}" class="<?php if ($_SERVER['REQUEST_URI'] === '/create') echo 'bg-gray-900 text-white hover:text-blue-300'; else echo 'text-white hover:bg-white/5 hover:text-blue-300'; ?>">@auth Create an Article @else Log In @endauth</a>
                    
                </div>
           
</nav>


  

