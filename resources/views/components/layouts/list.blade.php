<main class="grid w-full gap-4 lg:gap-x-32 px-6 md:px-16 pb-24">
    @foreach ($events->sortBy('expiration_date') as $event)
        <div id="app"
            href="{{ route('events.show', $event) }}"class="bg-white  rounded-lg shadow-md flex card text-grey-darkest">
            <div class=" flex gap-3 flex-col justify-between">
                <img class="  mt-3 ml-3 max-w-36 max-h-36  rounded-lg"
                    src="{{ asset('storage/images/events/' . $event->image_path) }}" alt="Room Image">
                @can('join-events')
                @if($event->users->doesntContain(Auth::user()) 
                && new DateTime($event['expiration_date']) > new DateTime()
                    && $event->max_participants > $event->participants)
                    <div class="bg-emerald-200 rounded-bl-lg rounded-tr-lg">
                        
                        <form action="{{ route('relation', $event) }}" method="POST" class="my-0">
                            @csrf
                            <div onclick="this.closest('form').submit()"
                                class="p-1 mr-2 flex items-center  justify-end transition hover:bg-grey-light">
                                Apuntar-s'hi
                                <i class="fas fa-chevron-right"></i>
                            </div>
                            </a>
                        </form>
                    </div>
                        @else
                        <a class=" bg-red-200 rounded-bl-lg rounded-tr-lg">
                            <div class="p-1 mr-2 ml-2 flex items-center  justify-end transition hover:bg-grey-light">
                                @if(!$event->users->doesntContain(Auth::user()))
                                    Ja estas apuntat!
                                @elseif (new DateTime($event['expiration_date']) < new DateTime())
                                    No disponible
                                @else
                                    Sense places
                                @endif
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        @endif

                    
                @endcan
            </div>
            <div class=" flex flex-1 flex-col ">
                <div class="p-3 pb-0 sm:flex flex-1 gap-7 flex-row  justify-start">
                    <div class="flex flex-col">
                        <p class="text-gray-400">
                            {{ new DateTime($event['expiration_date']) > new DateTime() ? $event->expiration_date.' '.$event->expiration_time : 'Esdeveniment passat' }}
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
                        <span class=" text-emerald-400">
                            {{ $event->max_participants - $event->participants == 0 
                                ? 'Sense places' 
                                : ($event->max_participants - $event->participants).' places lliures'}}
                        </span>
                        <div class="flex items-center mt-4">
                            <div class="pr-2 text-xs">
                                <i class="fas fa-wifi text-green"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col justify-around hidden sm:block ">
                        <span>{{ $event->description }}</span>
                    </div>
                </div>

                <div class="flex flex-1 flex-col justify-between">
                    <div class="flex gap-2 flex-row justify-end mr-4">
                        @auth
                            @can('edit-events')
                                <a class="text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200"
                                    href="{{ route('events.edit', $event) }}">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125">
                                        </path>
                                    </svg>
                                </a>
                            @endcan
                            @can('delete-events')
                                <form action="{{ route('events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="text-xs font-semibold text-red-500 uppercase transition duration-150 ease-in-out dark:text-red-500/80 hover:text-red-600 focus:outline-none"
                                        type="submit"><svg width="20" height="20" fill="none" stroke="currentColor"
                                            stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
                <div class=" ml-14 sm:ml-48 md:ml-56 lg:ml-72 flex flex-col">
                    <a href="{{ route('events.show', $event) }}" class=" bg-emerald-200 rounded-br-lg rounded-tl-lg">
                        <div class="p-1 mr-2 ml-2 flex items-center  justify-end transition hover:bg-grey-light">
                            Veure més
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</main>
