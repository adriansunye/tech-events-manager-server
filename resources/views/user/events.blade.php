<x-layouts.app title="User" meta-description="User meta desription">

  <div class="min-h-[50%]">
    <div class="bg-emerald-400 ">
      <div class="flex  justify-between p-8 ">
        <h2 class="text-4xl font-extrabold dark:text-white text-white" >Events</h2>
        @auth
        <form action="{{ route('logout') }}" method="POST">
          @csrf

          <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center  text-center  " onclick="this.closest('form').submit()">
            <svg width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="stroke-white">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
            </svg>
            
          </a>
        </form>
        @endauth
      </div>
      <div class="flex  items-center ">
      <div onclick="document.getElementById('nextEvents').style.display ='block'; 
                    document.getElementById('pastEvents').style.display ='none';
                    document.getElementById('nextEventsTitle').classList.add('underline', 'font-semibold');
                    document.getElementById('pastEventsTitle').classList.remove('underline', 'font-semibold');">
        <button id="nextEventsTitle" class="ml-8 underline text-white font-semibold hover:text-emerald-700">Esdeveniments</button>
      </div>
      <div onclick="document.getElementById('pastEvents').style.display ='block'; 
                    document.getElementById('nextEvents').style.display ='none';
                    document.getElementById('nextEventsTitle').classList.remove('underline', 'font-semibold');
                    document.getElementById('pastEventsTitle').classList.add('underline', 'font-semibold');">
        <button id="pastEventsTitle" class="ml-8 text-white  hover:text-emerald-700"> Esdeveniments passats</button>
      </div>
      </div>
    </div>

    <div id="nextEvents"class="px-6 pt-6 pb-14 grid w-full gap-4 lg:gap-x-32" style="display: block">

      @foreach ($events->sortBy('expiration_date') as $event)
        <x-layouts.eventsUser :event=$event/>
      @endforeach
    </div>

    <div id="pastEvents"class="px-6 pt-6 pb-14 grid w-full gap-4 lg:gap-x-32" style="display: none">

      @foreach ($events->filter(function ($ev) {return $ev->expiration_date > new DateTime();}) as $event)
        <x-layouts.eventsUser :event=$event/>
      @endforeach
    </div>
  </div>
</x-layouts.app>