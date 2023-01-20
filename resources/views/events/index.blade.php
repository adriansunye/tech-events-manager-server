<x-layouts.app title="Events" meta-description="More meta desription">

    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class=" text-3xl text-sky-600 dark:text-sky-500">Events</h1>

        @can('create-events')
            <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-emerald-400 hover:bg-emerald-600 active:bg-emerald-600 focus:outline-none focus:border-emerald-600 focus:shadow-outline-sky"
                href="{{ route('events.create') }}">Create new event</a>
        @endcan

    </header>
    
    <x-layouts.list :events=$events/>
</x-layouts.app>
