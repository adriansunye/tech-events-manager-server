<x-layouts.app 
  title="Create event" 
  meta-description="Form to create new event"
>

  <div class="bg-emerald-400 ">
    <div class="flex  justify-between p-8 ">
      <h2 class="text-4xl font-extrabold dark:text-white text-white" >Crear esdeveniment</h2>
      @auth
      <form action="{{ route('logout') }}" method="POST">
        @csrf

        <a href="#" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center  text-center  " onclick="this.closest('form').submit()">
          <svg width="35" height="35" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="stroke-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
          </svg>
          
        </a>
      </form>
      @endauth
    </div>
  
</div>
<form class=" max-w-xl px-8 py-4 mx-auto bg-white rounded" action="{{ route('events.store') }}" method="POST"  enctype="multipart/form-data">
  @csrf
    @include('events.form-fields')
    <div class="mb-16">
      <div class="text-center mb-2">
        <span>Si està d’acord premi el botó continuar </span>
    </div>
      <button
          class="w-full  shadow bg-emerald-500 hover:bg-emerald-400 focus:shadow-outline focus:outline-none text-white font-bold rounded"
          type="submit" style="padding: 10px 112px;">
          Continuar
      </button>
  </div>

</form>
</x-layouts.app>