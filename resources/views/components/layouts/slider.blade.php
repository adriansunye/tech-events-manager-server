
<section id="topEvents" class="top--events">
  <div class=" flex flex-row justify-start gap-3 m-2 rounded-lg px-2 pt-4 pb-2  mt-6 overflow-x-scroll no-scrollbar">
      @foreach ($events->sortBy('expiration_date')->where('highlighted', true) as $event)
      <div class="min-w-fit  bg-white rounded-t-lg">
          <a href="{{ route('events.show', $event) }}">
              <img class=" w-full -translate-y-1/2 -top-1/2 left-1/2 sm:-translate-y-0 sm:-top-0 sm:left-0 sm:h-40 sm:object-cover sm:max-h-60 rounded-t-lg" src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="" />
            </a>
          <a href="{{ route('events.show', $event) }}">
            <div class=" rounded-b-lg p-4 bg-gray-100 h-15 -translate-y-48 -top-1/4 left-1/2 sm:-translate-y-0 sm:-top-0 sm:left-0">
              
                  <h5 class="text-xs font-medium tracking-tight text-gray-900 dark:text-white"> 
                    {{ new DateTime($event['expiration_date']) > new DateTime() ? $event->expiration_date.' '.$event->expiration_time : 'Esdeveniment passat' }}
                  </h5>
                  <h5 class="font-bold mb-1 text-grey-darkest">{{ $event->title }}</h5>
                  <div class="text-xs flex items-center mb-2">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                        </path>
                    </svg>
                    {{ $event->location }}
                </div>
                <p class="text-xs">Paricipants: {{ $event->participants."/".$event->max_participants}}</p>
            </div>
          </a>
      </div>
      @endforeach
  </div>
</section>

