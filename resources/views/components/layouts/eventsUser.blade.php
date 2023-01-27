<a href="{{ route('events.show', $event) }}">
<div id="app" class="bg-white  rounded-lg border-t mb-3 shadow-md flex card text-grey-darkest">
    <div class="p-3">
      <svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"></path>
      </svg>
    </div>
      <div class=" flex flex-1 flex-col ">
          <div class="p-3 pb-0 sm:flex flex-1 gap-7 flex-row  justify-start">
              <div class="flex flex-col">
                  <p class="text-gray-400">
                      {{ new DateTime($event['expiration_date']) > new DateTime() ? $event->expiration_date : 'Esdeveniment passat' }}
                  </p>
                  <h3 class="font-bold mb-1 text-grey-darkest">{{ $event->title }}</h3>
                  <div class="text-xs flex items-center mb-4">
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
                  <div class="flex items-center mt-4">
                      <div class="pr-2 text-xs">
                          <i class="fas fa-wifi text-green"></i>
                      </div>
                  </div>
              </div>
              <div class="    flex-1 flex-col justify-around hidden sm:block ">
                  <span>{{ $event->description }}</span>
              </div>
          </div>
          

      </div>
      <div class=" flex gap-3 flex-col justify-between">
        <img class="m-3 max-w-36 max-h-36  rounded-lg"
            src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Room Image">
    </div>
  </div>
</a>