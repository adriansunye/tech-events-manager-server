<x-layouts.app 
  title="Create event" 
  meta-description="Form to create new event"
>
<h1 class="my-4  text-3xl text-center text-sky-600 dark:text-sky-500">Create new event</h1>
<form class=" max-w-xl px-8 py-4 mx-auto bg-white rounded" action="{{ route('events.store') }}" method="POST"  enctype="multipart/form-data">>  
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