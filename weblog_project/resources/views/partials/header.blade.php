<header class="relative bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <?php $pageName = explode('.', ($currentRoute = request()->route()->getName()))[0] ?? $currentRoute; ?>
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        @auth
          Welcome {{ auth()->user()->name }},
        @else
          Welcome,
        @endauth
        <?php echo 'you are currently on the ' . $pageName . ' page'; ?>
      </h1>
    </div>

    @auth
      @if(auth()->user()->is_premium)
        <div class="inline-block bg-yellow-200 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full w-max">
          Premium
        </div>
      @endif
    @endauth

  </header>