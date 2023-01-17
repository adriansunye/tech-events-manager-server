<x-layouts.app 
  title="Register" 
  meta-description="Register meta desription"
>

<x-layouts.back-button />
<div class="max-w-xl px-8 py-4 mx-auto bg-white rounded">

    <h2 class="text-2xl">Crea el teu compte</h2>

</div>
<form class=" max-w-xl px-8 py-4 mx-auto bg-white rounded" action="{{ route('register') }}" method="POST">   
    @csrf
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Nom
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="name" type="text" value="{{ old('name') }}" placeholder="ingressa el teu nom">
                @error('name')
                    <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Correu electrònic
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="email" type="email" value="{{ old('email') }}" placeholder="nom@exemple.com">
            @error('email')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Contrasenya
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="password" type="password" placeholder="Ingressa la teva contrasenya">
            @error('password')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Confirmar contrasenya
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="password_confirmation" type="password"  placeholder="Confirmar la teva contrasenya">
            @error('password_confirmation')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="block fixed inset-x-10 bottom-24">
            <button
                class="w-full  shadow bg-emerald-500 hover:bg-emerald-400 focus:shadow-outline focus:outline-none text-white font-bold rounded"
                type="submit" style="padding: 18px 112px;">
                Registra’t
            </button>
            <div class="text-center mt-2">
                <span>Ja ets usuari?  </span>
                <a class="text-sm font-semibold underline border-2 border-transparent rounded text-blue-600 focus:border-slate-500 focus:outline-none"
                    href="{{ route('login') }}">
                    Inicia sessió</a>
            </div>
        </div>

</form>

</x-layouts.app>