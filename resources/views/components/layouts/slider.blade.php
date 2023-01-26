<section id="topEvents" class="top--events">
  <h2 class="text-xl font-medium text-center">Esdeveniments rellevants</h2>
  <div class="top--events-carousel flex flex-row gap-6 m-2 rounded-lg p-10 overflow-x-scroll no-scrollbar">
      @foreach ($events->sortBy('expiration_date')->where('highlighted', true) as $event)
      <div class="w-8 h-30 bg-white first:px-0 shadow min-w-fit">
          <a href="{{ route('events.show', $event) }}">
              <img class="rounded-t-lg w-full h-40 object-cover max-h-60" src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="" />
          </a>
          <a href="{{ route('events.show', $event) }}">
            <div class="p-4 bg-gray-100 h-15">
              
                  <h5 class="text-xs font-medium tracking-tight text-gray-900 dark:text-white"> Data: {{ $event['expiration_date']}}</h5>
                  <h5 class="font-bold mb-1 text-grey-darkest">{{ $event->title }}</h5>
                  {{-- <p class="text-xs">{{ $event->description }}</p> --}}
                  {{-- <p class="text-xs">{{ $event->location }}</p> --}}
                  {{-- <p class="text-xs">{{ $event->participants."/".$event->max_participants}}</p> --}}
            </div>
          </a>
      </div>
      @endforeach
  </div>
</section>