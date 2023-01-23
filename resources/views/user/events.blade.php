<x-layouts.app title="User" meta-description="User meta desription">

  <div class="min-h-[50%]">
    <div class="bg-emerald-400 ">
      <div class="flex  justify-around ">
        <h2 class="text-4xl font-extrabold dark:text-white" >Perfil</h2>
        @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf

          <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center  text-center  " onclick="this.closest('form').submit()">
            <svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
            </svg>
            <span class="tab tab-whishlist block text-xs">Logout</span>
          </a>
        </form>
        @endauth
      </div>

    </div>

    <div>

      @foreach ($events as $event)
      <a href="#" class="flex  items-center bg-white border   hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    
        <div class="flex flex-col justify-between  leading-normal ">
          <p class="text-gray-400 "> {{ $event->expiration_date }}</p>
          <h3 class="font-bold mb-1 text-grey-darkest ">{{ $event->title }}</h3>
          <div class="text-xs flex items-center mb-4">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
              </path>
            </svg>
            {{ $event->location }}
          </div>
        </div>
        <img class="flex flex-row-reverse h-auto max-w-lg ml-auto" src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Room Image">
      </a>
      @endforeach
    </div>
     
  </div>

  @auth
  <div class="text-white">
    Authenticated User: {{Auth::user()->name}}
  </div>
  @endauth
</x-layouts.app>