<div class="w-full">
    <!-- <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white shadow"> // if shown only tablet/mobile-->
    <section id="bottom-navigation" class="block fixed inset-x-0 bottom-0 z-10 bg-white shadow">
        <div id="tabs" class="flex justify-between">
            <a href="{{ route('events.index') }}"
                class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg width="25" height="25" fill="none" stroke-width="1.5" viewBox="0 0 24 24"
                    class="inline-block mb-1 {{ request()->routeIs('events.index') ? 'stroke-emerald-500' : 'stroke-black' }}">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                    </path>
                </svg>
                <span class="tab tab-home block text-xs">Home</span>
            </a>
            <a href="{{ route('user.events') }}"
                class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <svg width="25" height="25" fill="none" stroke-width="1.5" viewBox="0 0 24 24"
                    class="inline-block mb-1 {{ request()->routeIs('user.events') ? 'stroke-emerald-500' : 'stroke-black' }}">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5">
                    </path>
                </svg>
                <span class="tab tab-explore block text-xs">Events</span>
            </a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <a href="#"
                        class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1"
                        onclick="this.closest('form').submit()">
                        <svg  width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"  class="inline-block mb-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                          </svg>
                        <span class="tab tab-whishlist block text-xs">Profile</span>
                    </a>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}"
                    class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24"
                        class="inline-block mb-1 {{ (request()->routeIs('login') || request()->routeIs('register')) ? 'stroke-emerald-500' : 'stroke-black' }}">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75">
                        </path>
                    </svg>
                    <span class="tab tab-account block text-xs">Login</span>
                </a>
            @endguest
        </div>
    </section>
</div>
