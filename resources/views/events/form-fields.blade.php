<div class="pb-2">
    <div class=" mb-2">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Esdeveniment
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="title" type="text" placeholder="Nom del esdeveniment" value="{{old('title', $event->title)}}">
                @error('title')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label for="description" class="block text-gray-500 font-bold mb-1 pr-4">DescripciĆ³</label>
            <textarea id="description" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                name="description"
                placeholder="DescripciĆ³ esdeveniment">{{old('description', $event->description)}}
            </textarea>
            @error('description')
            <small class="font-bold text-red-500/80">{{ $message }}</small>
            @enderror
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Data/Hora
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="expiration_date" type="datetime-local"  placeholder="Data i hora del esdeveniment" value={{old('expiration_date',  $event->expiration_date.'T'.$event->expiration_time)}}>
                @error('expiration_date')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                LocalĀ·litzaciĆ³
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="location" type="text"  placeholder="Ingressa el lloc del esdeveniment" value="{{old('location', $event->location)}}">
                @error('location')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Participants
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="max_participants" type="number"  placeholder="Ingressa el nĆŗmero de participants" value={{old('max_participants', $event->max_participants)}}>
                @error('max_participants')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class=" mb-6">
        <div class="mb-1">
            <label class="block text-gray-500 font-bold mb-1 pr-4" for="inline-full-name">
                Imatge
            </label>
        </div>
        <div class="mb-1">
            <input
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-emerald-400 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                name="image_path" type="file"  placeholder="Imatge esdevenimentt">
                @error('image_path')
                <small class="font-bold text-red-500/80">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <label class="relative inline-flex items-center mr-5 cursor-pointer">
        <input type="checkbox" name="highlighted" class="sr-only peer" @checked(old('highlighted', $event->highlighted )) />
        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Destacat</span>
      </label>
</div>