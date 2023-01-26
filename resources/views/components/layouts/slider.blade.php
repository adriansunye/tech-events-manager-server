
<div id="default-carousel" class="relative" data-carousel="slide">
    {{-- <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         @foreach ($events->where('highlighted', true) as $event)
        <div class="w-full" data-carousel-item>
            <img src="{{ asset('storage/images/events/'. $event->image_path) }}" class="  w-full  -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
       @endforeach
    </div> --}}
    
</div>
    