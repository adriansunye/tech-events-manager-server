<x-layouts.app 
  title="User" 
  meta-description="User meta desription"
>
@auth
<form action="{{ route('logout') }}" method="POST">
    @csrf

    <a href="#"
        class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1"
        onclick="this.closest('form').submit()">
          <svg  width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"  class="inline-block mb-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
          </svg>
        <span class="tab tab-whishlist block text-xs">Logout</span>
    </a>
</form>
@endauth

<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">User Events</h1>
@auth
  <div class="text-white">
    Authenticated User: {{Auth::user()->name}}
  </div>
@endauth
</x-layouts.app>