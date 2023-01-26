<x-layouts.app 
  :title="$event->title" 
  :meta-description="$event->description"
>
<div class="flex flex-col items-center">
<img class="h-auto max-w-lg mx-auto rounded-lg" src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Room Image">
<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">{{ $event->title }}</h1>

<div class="text-3s text-center flex items-center mb-4">
            <svg width="20" height="20"  fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"></path>
            </svg>
            <p class="text-gray-400 "> {{ $event->expiration_date }}</p>
          </div>

          <div class="text-3s text-center flex items-center mb-4">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
              </path>
            </svg>
            {{ $event->location }} 
</div>

<div class="flex flex-col max-w-xl px-8 py-4 mx-auto bg-white rounded shadow h-96 dark:bg-slate-800">
    <p class="flex-1 leading-normal text-slate-600 dark:text-slate-400">{{ $event->description }}</p>

    <a class="mr-auto text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('events.index') }}">Regresar</a>
</div>
</div>
@can('join-events')
@if($event->users->doesntContain(Auth::user()) 
  && new DateTime($event['expiration_date']) > new DateTime() 
    && $event->max_participants > $event->participants)
<form action="{{ route('relation', $event) }}" method="POST">
  @csrf

  <button
      class="text-xs font-semibold text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none"
      type="submit">
      JOIN
  </button>
</form> 
@endif
@endcan
</x-layouts.app>