<x-layouts.app 
  :title="$event->title" 
  :meta-description="$event->description"
>
<h1 class="my-4 text-3xl text-center text-sky-600 dark:text-sky-500">Edit form</h1>
<form class=" max-w-xl px-8 py-2 mx-auto bg-white rounded" 
action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">    
  @csrf @method('PATCH')
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
 </form>
</x-layouts.app>