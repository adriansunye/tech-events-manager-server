<header class="pb-5">
    <div class="flex flex-col bg-emerald-400">
        <img class="max-w-36 max-h-56 sm:max-h-36 block sm:hidden "
            src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Event Image">
            <div class=" gap-3 flex-row justify-around hidden sm:flex">
              <img class="m-3 max-w-56 max-h-56  rounded-lg"
                  src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Room Image">
          </div>
        <div class="absolute flex justify-between p-8 ">
            <a href="{{ route('events.index') }}">
                <svg height="35" width="35" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class=" stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                </svg>
            </a>

        </div>
    </div>
</header>