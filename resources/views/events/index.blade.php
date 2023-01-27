<x-layouts.app  title="Events" meta-description="More meta desription">

    <x-layouts.slider :events=$events/>

    <header class="px-6 py-3 space-y-2 text-center -translate-y-52 -top-1/2 left-1/2 sm:-translate-y-0 sm:-top-0 sm:left-0 ">
        @can('create-events')
            <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-emerald-400 hover:bg-emerald-600 active:bg-emerald-600 focus:outline-none focus:border-emerald-600 focus:shadow-outline-sky"
                href="{{ route('events.create') }}">Create new event</a>
        @endcan

    </header>
    
    
    <x-layouts.list :events=$events/>
</x-layouts.app>
