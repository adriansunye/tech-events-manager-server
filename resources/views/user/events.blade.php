<x-layouts.app 
  title="User" 
  meta-description="User meta desription"
>

<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">User Events</h1>
@auth
  <div class="text-white">
    Authenticated User: {{Auth::user()->name}}
  </div>
@endauth
</x-layouts.app>