@props(['banners'])
<div id="default-carousel" class="relative h-screen">
    <!-- Carousel wrapper -->
    <div class="relative h-full">
        @foreach ($banners as $banner)
            <x-home.banner :image="$banner->image" :heading="$banner->heading" :paragraph="$banner->paragraph" />
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute bottom-10 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($banners as $index => $banner)
            <button 
                type="button"
                class="h-3 w-3 rounded-full bg-white/40"
                aria-label="Slide {{ $index + 1 }}"
                aria-current="{{ $loop->first ? 'true' : 'false' }}"
                data-carousel-slide-to="{{ $index }}">
            </button>
        @endforeach
    </div>
</div>
