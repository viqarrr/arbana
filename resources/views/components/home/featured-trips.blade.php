<!-- Open Trip  -->
<section class="mx-auto max-w-8xl px-4 pb-10 lg:pb-16">
    <div class="flex flex-col md:justify-between md:items-center w-full lg:justify-center gap-4 pb-10 pt-20 lg:px-24">
        <h1 class="text-3xl font-semibold">Open Trip</h1>
        <h1 class="text-gray-500 mt-2 text-xl font-normal">
            Discover Your Next Adventure with Our Featured Trip Deals
        </h1>
    </div>
    {{-- List --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:px-24">
        {{-- Card 1 --}}
        <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
            <div class="relative">
                <img src="{{ url('storage/images/penanggungan.webp') }}" alt="Penanggungan"
                    class="h-40 w-full object-cover" />
            </div>
            <div class="p-4 pt-2">
                <!-- label trip -->
                <span class="bg-green-100 text-green-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Open
                    Trip</span>

                <div class="my-3">
                    <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Mount Penanggungan</h4>
                </div>

                <ul class="mt-2 flex flex-col gap-2">
                    <li class="flex items-center gap-2">
                        <svg class="text-gray-600 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Mojokerto</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">3 Days</p>
                    </li>
                </ul>

                <!-- harga -->
                <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 350.000<span
                        class="text-base font-normal">/pax</span></p>
            </div>
        </div>
        {{-- Card 1 --}}
        <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
            <div class="relative">
                <img src="{{ url('storage/images/butak.jpg') }}" alt="Penanggungan" class="h-40 w-full object-cover" />
            </div>
            <div class="p-4 pt-2">
                <!-- label trip -->
                <span class="bg-green-100 text-green-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Open
                    Trip</span>

                <div class="my-3">
                    <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Malang Mountains</h4>
                </div>

                <ul class="mt-2 flex flex-col gap-2">
                    <li class="flex items-center gap-2">
                        <svg class="text-gray-600 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Malang</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">3 Days</p>
                    </li>
                </ul>

                <!-- harga -->
                <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 850.000<span
                        class="text-base font-normal">/pax</span></p>
            </div>
        </div>
        {{-- Card 2 --}}
        <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
            <div class="relative">
                <img src="{{ url('storage/images/Kelut.jpg') }}" alt="Penanggungan"
                    class="h-40 w-full object-cover" />
            </div>
            <div class="p-4 pt-2">
                <!-- label trip -->
                <span class="bg-green-100 text-green-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Open
                    Trip</span>

                <div class="my-3">
                    <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Mount Kelud</h4>
                </div>

                <ul class="mt-2 flex flex-col gap-2">
                    <li class="flex items-center gap-2">
                        <svg class="text-gray-600 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Blitar</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Up to 3 Days</p>
                    </li>
                </ul>

                <!-- harga -->
                <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 850.000<span
                        class="text-base font-normal">/pax</span></p>
            </div>
        </div>
        {{-- Card 1 --}}
        <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
            <div class="relative">
                <img src="{{ url('storage/images/penanggungan.webp') }}" alt="Penanggungan"
                    class="h-40 w-full object-cover" />
            </div>
            <div class="p-4 pt-2">
                <!-- label trip -->
                <span class="bg-green-100 text-green-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Open
                    Trip</span>

                <div class="my-3">
                    <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Gunung Penanggungan</h4>
                </div>

                <ul class="mt-2 flex flex-col gap-2">
                    <li class="flex items-center gap-2">
                        <svg class="text-gray-600 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">Mojokerto</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
                    </li>

                    <li class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-500 h-4 w-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-gray-500 text-sm font-medium">3 Days</p>
                    </li>
                </ul>

                <!-- harga -->
                <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 350.000<span
                        class="text-base font-normal">/pax</span></p>
            </div>
        </div>
    </div>
</section>

<!-- Private Trip and Family Gathering -->
<section class="mx-auto max-w-8xl pl-4 pr-0 pb-10 lg:pb-16 lg:px-26">
    <div class="flex flex-col md:justify-between md:items-center lg:justify-center w-full gap-4 pb-10 pt-20">
        <h1 class="text-3xl font-semibold">Private and Family Gathering</h1>
        <h1 class="text-gray-500 mt-2 text-xl font-normal">
            Discover Your Next Adventure with Our Featured Trip Deals
        </h1>
    </div>
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">

            <!-- Gunung -->
            <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
                data-filter="gunung">
                <i class="fa-solid fa-mountain text-4xl mb-4 text-secondary"></i>
                <h3 class="font-semibold mb-2">Mount</h3>
                <p class="text-sm text-neutral-500">
                    Mountain trekking trips to top destinations.
                </p>
            </div>

            <!-- Anak Gunung -->
            <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
                data-filter="anak-gunung">
                <i class="fa-solid fa-person-hiking text-4xl mb-4 text-secondary"></i>
                <h3 class="font-semibold mb-2">Hill</h3>
                <p class="text-sm text-neutral-500">
                    Easy hikes, perfect for beginners & families.
                </p>
            </div>

            <!-- Pantai -->
            <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
                data-filter="pantai">
                <i class="fa-solid fa-umbrella-beach text-4xl mb-4 text-secondary"></i>
                <h3 class="font-semibold mb-2">beach</h3>
                <p class="text-sm text-neutral-500">
                    Relaxing vacation on beautiful beaches and blue seas.
                </p>
            </div>

        </div>
    </section>

    {{-- Scroll Container --}}
    <div class="relative max-w-7xl md:overflow-x-hidden md:mx-auto md:px-6">
        <!-- Arrow Kiri -->
        <button
            class="prevBtn hidden absolute -left-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-left"></i>
        </button>

        <!-- Arrow Kanan -->
        <button
            class="nextBtn hidden absolute -right-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-right"></i>
        </button>

        <div class="carousel-wrapper flex gap-6 overflow-x-auto pb-4 touch-pan-x scrollbar-hide"
            style="scroll-behavior: smooth; -webkit-overflow-scrolling: touch;">
            {{-- Card --}}
            <div class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 hover:shadow-xl overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/penanggungan.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Family
                        Gathering</span>
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Penanggungan</h4>
                    <p class="text-gray-500 text-sm">Mojokerto</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 350.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </div>

            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/butak.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Buthak</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/arjuno.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Arjuno</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/argopuro.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Argopuro</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/ijen.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Ijen</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/kawi.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Kawi</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/Kelut.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Kelut</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/lawu.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Lawu</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/raung.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Raung</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/semeru.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-blue-100 text-blue-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Private
                        Trip</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Semeru</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>

            {{-- Card 6 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 2.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Family
                        Gathering</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Kebo Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 7 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 3.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Family
                        Gathering</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Balekambang Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 8 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 4.jpeg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Family
                        Gathering</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Pasir Putih Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 8 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 5.jpeg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Family
                        Gathering</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Teluk Penyu Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- dst... --}}
        </div>
</section>

<!-- Camp Ground -->
<section class="mx-auto max-w-8xl pl-4 pr-0 pb-10 lg:pb-16 lg:px-26">
    <div class="flex flex-col md:justify-between md:items-center lg:justify-center w-full gap-4 pb-10 pt-20">
        <h1 class="text-3xl font-semibold">Camp Ground</h1>
        <h1 class="text-gray-500 mt-2 text-xl font-normal">
            Discover Your Next Adventure with Our Featured Trip Deals
        </h1>
    </div>
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">
            <!-- Anak Gunung -->
            <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
                data-filter="anak-gunung">
                <i class="fa-solid fa-person-hiking text-4xl mb-4 text-secondary"></i>
                <h3 class="font-semibold mb-2">Hill</h3>
                <p class="text-sm text-neutral-500">
                    Easy hikes, perfect for beginners & families.
                </p>
            </div>

            <!-- Pantai -->
            <div class="filter-btn bg-white rounded-lg shadow hover:shadow-lg transition p-6 flex flex-col items-center text-center"
                data-filter="pantai">
                <i class="fa-solid fa-umbrella-beach text-4xl mb-4 text-secondary"></i>
                <h3 class="font-semibold mb-2">Beach</h3>
                <p class="text-sm text-neutral-500">
                    Relaxing vacation on beautiful beaches and blue seas.
                </p>
            </div>

        </div>
    </section>

    {{-- Scroll Container --}}
    <div class="relative max-w-7xl md:overflow-x-hidden md:mx-auto md:px-6">
        <!-- Arrow Kiri -->
        <button
            class="prevBtn hidden absolute -left-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-left"></i>
        </button>

        <!-- Arrow Kanan -->
        <button
            class="nextBtn hidden absolute -right-1 top-1/2 -translate-y-1/2 w-12 h-12 md:flex items-center justify-center text-amber-500 text-4xl z-10 hover:text-amber-400">
            <i class="fa-solid fa-circle-chevron-right"></i>
        </button>
        <div class="carousel-wrapper flex gap-6 overflow-x-auto pb-4 touch-pan-x scrollbar-hide"
            style="scroll-behavior: smooth; -webkit-overflow-scrolling: touch;">
            {{-- Card --}}
            <a class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 hover:shadow-xl overflow-hidden"
                data-category="gunung">
                <img src="{{ url('storage/images/penanggungan.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Mount Penanggungan</h4>
                    <p class="text-gray-500 text-sm">Mojokerto</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 350.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>

            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt tanggung.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Tanggung</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt semar.png') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Semar</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt rengganis.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Rengganis</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt pundak.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Pundak</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt lorokan.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Lorokan</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card lainnya tinggal ulangi --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="anak-gunung">
                <img src="{{ url('storage/images/mt bekel.webp') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span
                        class="bg-yellow-100 text-yellow-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">MT Bekel</h4>
                    <p class="text-gray-500 text-sm">Malang</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 6 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 2.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Kebo Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 7 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 3.jpg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Balekambang Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 8 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 4.jpeg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Pasir Putih Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- Card 8 --}}
            <a href="/trips"
                class="trip-card bg-white rounded-xl shadow-lg h-80 min-w-[280px] snap-start shrink-0 overflow-hidden"
                data-category="pantai">
                <img src="{{ url('storage/images/pantai 5.jpeg') }}" class="h-40 w-full object-cover" />
                <div class="p-4 pt-2">
                    <span class="bg-red-100 text-red-800 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium">Camp Ground</span>
                    <h4 class="text-gray-900 mt-3 mb-1 text-lg font-bold">Teluk Penyu Beach</h4>
                    <p class="text-gray-500 text-sm">Blitar</p>
                    <p class="text-gray-900 mt-1 text-2xl font-extrabold">Rp 850.000<span
                            class="text-base font-normal">/pax</span></p>
                </div>
            </a>
            {{-- dst... --}}
        </div>
</section>
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll(".carousel-wrapper");

    carousels.forEach((carousel) => {
        let scrollAmount = 0;
        const cardWidth = parseInt(carousel.dataset.cardWidth) || 280;
        const step = parseInt(carousel.dataset.step) || 1;
        const scrollStep = cardWidth * step;

        let interval;

        function startAutoScroll() {
            if (window.innerWidth >= 768 && !interval) {
                interval = setInterval(() => {
                    scrollAmount += scrollStep;
                    if (scrollAmount + carousel.clientWidth >= carousel.scrollWidth) {
                        scrollAmount = 0;
                    }
                    carousel.scrollTo({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                }, 3000);
            }
        }

        function stopAutoScroll() {
            if (interval) {
                clearInterval(interval);
                interval = null;
            }
        }

        // Start awal
        startAutoScroll();

        // Hentikan atau start ulang pas resize
        window.addEventListener("resize", () => {
            if (window.innerWidth < 768) {
                stopAutoScroll();
            } else {
                startAutoScroll();
            }
        });

        const nextBtn = carousel.parentElement.querySelector(".nextBtn");
        const prevBtn = carousel.parentElement.querySelector(".prevBtn");

        nextBtn?.addEventListener("click", () => {
            scrollAmount += scrollStep;
            if (scrollAmount > carousel.scrollWidth - carousel.clientWidth) {
                scrollAmount = carousel.scrollWidth - carousel.clientWidth;
            }
            carousel.scrollTo({
                left: scrollAmount,
                behavior: "smooth"
            });
            stopAutoScroll();
        });

        prevBtn?.addEventListener("click", () => {
            scrollAmount -= scrollStep;
            if (scrollAmount < 0) scrollAmount = 0;
            carousel.scrollTo({
                left: scrollAmount,
                behavior: "smooth"
            });
            stopAutoScroll();
        });

        // Hentikan auto scroll saat hover
        carousel.addEventListener("mouseenter", stopAutoScroll);
        carousel.addEventListener("mouseleave", startAutoScroll);
    });
});

</script>
<style>
    /* Hilangkan scrollbar di semua browser */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari */
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE & Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

{{-- filter --}}
<script>
    const filterBtns = document.querySelectorAll(".filter-btn");
    const tripCards = document.querySelectorAll(".trip-card");

    filterBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const filter = btn.dataset.filter;

            tripCards.forEach((card) => {
                card.style.display = card.dataset.category === filter ? "block" : "none";
            });
        });
    });
</script>
