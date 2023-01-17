<x-layouts.app 
  title="Events" 
  meta-description="More meta desription"
>
  
<header class="px-6 py-4 space-y-2 text-center">
  <h1 class=" text-3xl text-sky-600 dark:text-sky-500">Events</h1>
  
    @can('create events')
  <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-emerald-400 hover:bg-emerald-600 active:bg-emerald-600 focus:outline-none focus:border-emerald-600 focus:shadow-outline-sky" href="{{ route('events.create') }}">Create new event</a>
    @endcan
  
</header>
<main class="grid w-full gap-4 px-4 lg:px-16 md:grid-cols-2 lg:grid-cols-3 pb-24">
  @foreach($events as $event)
  <a  href="{{ route('events.show', $event) }}" class=" border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

    <div class="grid grid-cols-4 md:grid-cols-7  ">

      <!-- Profile Picture -->
      <div class="md:col-span-3">
        <img src="{{ asset('storage/images/events/'.$event->image_path) }}" class="w-full h-full rounded-l-lg" />
      </div>

      <!-- Description -->
      <div class="col-span-3 md:col-span-4 m-3 ">

        <p class="text-sky-500 font-bold text-xs"> 7+ SPOTS LEFT </p>

        <p class="text-gray-600 font-bold">{{ $event->title }} </p>

        <p class="text-gray-400"> Fri, Mar 11 . 8:00 - 9:30 AM </p>

        <p class="text-gray-400"> Beginner speakers </p>

      </div>

     {{--  @auth
      <div class="flex justify-between">
        @can('edit events')
          <a class="inline-flex items-center text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200" href="{{ route('events.edit', $event) }}">Edit</a>
        @endcan
        @can('delete events')
          <form action="{{ route('events.destroy', $event) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="inline-flex items-center text-xs font-semibold tracking-widest text-center text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none" type="submit">Delete</button>
          </form>
        @endcan
      </div>
    @endauth --}}

    </div>

  </a>
 
  @endforeach
</main>
</x-layouts.app>