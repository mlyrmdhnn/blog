<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-my-nav-link href="/" :current="request()->is('/')">Home</x-my-nav-link>
            <x-my-nav-link href="/post" :current="request()->is('post')">Blog</x-my-nav-link>
            <x-my-nav-link href="/about" :current="request()->is('about')">About</x-my-nav-link>
            <x-my-nav-link href="/contact" :current="request()->is('contact')" >Contact</x-my-nav-link>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">

            <!-- Profile dropdown -->
            @if (Auth::user())
            <el-dropdown class="relative ml-3">
                <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) :  asset('img/default.jpg') }}" alt="{{ Auth::user()->name }}" alt="{{ Auth::user()->avatar }}" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                </button>

                <el-menu anchor="bottom end" popover class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                  <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Your profile</a>
                  <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Dashboard</a>
                 <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">logout</button>
                </form>
                </el-menu>
              </el-dropdown>

              <div class="ml-4">
                <h1 class="text-white">{{ Auth::user()->name }}</h1>
              </div>
            @else
              {{-- <h1 class="text-white">keren</h1> --}}
        <div class="flex gap-4">
            <a href="/login" class="text-gray-300 hover:text-white transform">Login</a>
            <span class="text-gray-300">|</span>
            <a href="/register" class="text-gray-300 hover:text-white transform">Register</a>
        </div>
            @endif

          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <x-my-nav-link href="/" :current="request()->is('/')">Home</x-my-nav-link>
        <x-my-nav-link class="block" href="/post" :current="request()->is('post')">Blog</x-my-nav-link>
        <x-my-nav-link class="block" href="/about" :current="request()->is('about')">About</x-my-nav-link>
        <x-my-nav-link class="block" href="/contact" :current="request()->is('contact')" >Contact</x-my-nav-link>
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">

        <div class="flex items-center px-5">
          <div class="shrink-0">
            @if (Auth::user())


            <img  src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) :  asset('img/default.jpg') }}" alt="{{ Auth::user()->name }}" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
            @endif
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
              <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>


        @if (Auth::user())
        <div class="mt-3 space-y-1 px-2">
            <a href="/profile" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your profile</a>
            <a href="/dashboard" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Dashboard</a>
           <form method="post" action="/logout" >
              @csrf
              <button type="submit" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">logout</button>
           </form>
          </div>
        @else
        <div class="mt-3 space-y-1 px-2">
            <a href="/register" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Register</a>
            <a href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Login</a>

          </div>
        @endif
      </div>
    </el-disclosure>
  </nav>