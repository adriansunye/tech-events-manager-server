<x-layouts.app 
  title="Home" 
  meta-description="Home meta desription"
>

<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">Home</h1>
@auth
  <div class="text-white">
    Authenticated User: {{Auth::user()->name}}
  </div>
  
@endauth


</x-layouts.app>