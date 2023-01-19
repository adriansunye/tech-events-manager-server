<x-layouts.app 
  :title="$event->title" 
  :meta-description="$event->description"
>
<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">{{ $event->title }}</h1>
<div class="flex flex-col max-w-xl px-8 py-4 mx-auto bg-white rounded shadow h-96 dark:bg-slate-800">
    <p class="flex-1 leading-normal text-slate-600 dark:text-slate-400">{{ $event->description }}</p>

    <a class="mr-auto text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600 focus:border-slate-500 focus:outline-none" href="{{ route('events.index') }}">Regresar</a>
</div>
@can('join events')
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