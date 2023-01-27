<x-layouts.app :title="$event->title" :meta-description="$event->description">


<x-layouts.header-navigation :event=$event/>

    <section class="pl-6">
        <h3 class="text-3xl mb-6">{{ $event->title }}</h3>


        <div class="p-3 pb-0 flex flex-1 gap-7 flex-row  justify-start">
            <div class="pl-1">
                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col">
                <p class="text-black font-semibold text-lg">
                    {{ new DateTime($event['expiration_date']) > new DateTime() ? $event->expiration_date  : 'Esdeveniment passat' }}
                </p>

                <a class="text-sm font-semibold border-2 border-transparent rounded text-blue-600 focus:border-slate-500 focus:outline-none"
                    href="">
                    Afegir al calendari</a>
            </div>
        </div>
        <div class="p-3 pb-0 flex flex-1 gap-7 flex-row  justify-start">
            <div class="pl-1">
                <svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col">
                <p class="text-black font-semibold text-lg">
                    {{ $event->location }}
                </p>
            </div>
        </div>

        <div class=" fixed inset-x-10 bottom-56 pb-0 flex flex-1 flex-col  justify-start">
            <h2 class="text-lg font-semibold">Descripció</h2>
            <div class="flex flex-row">
                <p class="text-black text-md">
                    {{ $event->description }}
                </p>
            </div>
        </div>

        <div class=" fixed inset-x-10 bottom-20 pb-0 flex flex-1 flex-col ">
            <div class="flex flex-row text-black  justify-between">
                <div class="flex flex-col">
                    <span class="font-semibold">Paricipants</span>
                    <span> {{ $event->participants . '/' . $event->max_participants }}</span>
                </div> 
                @can("join-events")
                @if($event->users->doesntContain(Auth::user()) 
                && new DateTime($event['expiration_date']) > new DateTime()
                    && $event->max_participants > $event->participants)
                <div class="bg-emerald-400 rounded-lg ">
                        
                  <form action="{{ route('relation', $event) }}" method="POST" class="my-0">
                      @csrf
                      <button onclick="this.closest('form').submit()"
                          class="px-7 pt-3 justify-end transition hover:bg-grey-light">
                          Uneix-te
                          
                      </button>
                      </a>
                  </form>
              </div>
              @else
              <a class="bg-red-400 rounded-lg text-white font-semibold">
                <div class="p-2 pt-2 flex items-center  justify-end transition hover:bg-grey-light">
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
            @can('edit-events')
            <div class="flex flex-1 flex-col justify-between">
              <div class="flex gap-2 flex-row justify-end mr-4">
                  @auth
                          <a class="text-xs font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out dark:text-slate-400 text-slate-500 hover:text-slate-600 dark:hover:text-slate-500 focus:outline-none focus:border-slate-200"
                              href="{{ route('events.edit', $event) }}">
                              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5"
                                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125">
                                  </path>
                              </svg>
                          </a>
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
                      @endcan
                  @endauth
              </div>
          </div>
            </div>
        </div>
    </section>


</x-layouts.app>
