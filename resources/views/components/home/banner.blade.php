@props(['image', 'heading', 'paragraph'])

<div class="absolute inset-0 opacity-0" data-carousel-item>
    <div class="absolute left-1/2 top-1/2 block h-screen w-full -translate-x-1/2 -translate-y-1/2">
        <div id="carousel-wrapper" class="-z-1 flex h-full items-center bg-cover bg-top bg-no-repeat"
            style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('storage/' . $image) }}');">
            <div class="flex max-w-7xl flex-col items-start px-4 sm:px-6 lg:px-24">
                <!-- Title -->
                <div class="mt-8 max-w-2xl text-start">
                    <h1 class="block text-6xl font-bold text-primary md:text-7xl lg:text-8xl">
                        {{ $heading }}
                    </h1>
                </div>
                <!-- End Title -->

                <div class="max-w-3xl text-start">
                    <p class="text-xl text-primary">
                        {{ $paragraph }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
