<x-layouts.app title="Login" meta-description="Login meta desription">

    <x-layouts.back-button />
    <div class="max-w-xl px-8 py-4 mx-auto bg-white rounded">

        <h2 class="text-2xl">Inicia sessió</h2>

    </div>
    <form class=" max-w-xl px-8 py-4 mx-auto bg-white rounded" action="{{ route('login') }}" method="POST">
        @csrf
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
        <div class="mb-6">
            <div class="mb-1">
                <label class="block text-gray-500 font-bold  mb-1  pr-4">
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
        <div class="flex justify-between">
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                Vull mantenir la sessió iniciada
            </span>
            <label class="relative inline-flex items-center mr-5 cursor-pointer">

                <input type="checkbox" name="remember" class="sr-only peer" checked>
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500">
                </div>

            </label>
        </div>

        <div class="block fixed inset-x-10 bottom-24">
            <button
                class="w-full  shadow bg-emerald-500 hover:bg-emerald-400 focus:shadow-outline focus:outline-none text-white font-bold rounded"
                type="submit" style="padding: 18px 131px;">
                Entra
            </button>
            <div class="text-center mt-2">
                <span>Encara no ets usuari? </span>
                <a class="text-sm font-semibold underline border-2 border-transparent rounded text-blue-600 focus:border-slate-500 focus:outline-none"
                    href="{{ route('register') }}">
                    Registra’t</a>
            </div>
        </div>





    </form>



</x-layouts.app>
