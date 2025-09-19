<!-- Family Gathering  -->
<section class="mx-auto max-w-8xl px-4 pb-10 lg:pb-16">
    <div class="flex flex-col md:flex-row md:justify-between md:items-end w-full gap-4 pb-10 pt-20 lg:px-24">
      <div>
        <h1 class="text-3xl font-semibold">Featured Trip</h1>
        <h1 class="text-gray-500 mt-2 text-xl font-normal">
          Discover Your Next Adventure with Our Featured Trip Deals
        </h1>
      </div>
      <div class="flex items-center gap-2 hover:underline">
        <p class="text-lg">See All Trip Plans</p>
        <svg
          class="text-gray-800 h-6 w-6"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 12H5m14 0-4 4m4-4-4-4"
          />
        </svg>
      </div>
    </div>
    {{-- List --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:px-24">
      {{-- Card 1 --}}
      <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-40 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">
          <!-- label trip -->
          <span
            class="bg-amber-100 text-amber-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium"
          >Family Gathering</span>

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Mount Penanggungan</h4>
          </div>

          <ul class="mt-2 flex flex-col gap-2">
            <li class="flex items-center gap-2">
              <svg
                class="text-gray-600 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                />
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">Mojokerto</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">3 Days</p>
            </li>
          </ul>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 350.000<span
              class="text-base font-normal"
            >/pax</span></p>
        </div>
      </div>
      {{-- Card 1 --}}
      <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
        <div class="relative">
          <img
            src="{{ url('storage/images/butak.jpg') }}"
            alt="Penanggungan"
            class="h-40 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">
          <!-- label trip -->
          <span
            class="bg-amber-100 text-amber-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium"
          >Open Trip</span>

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Malang Mountains</h4>
          </div>

          <ul class="mt-2 flex flex-col gap-2">
            <li class="flex items-center gap-2">
              <svg
                class="text-gray-600 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                />
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">Malang</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">3 Days</p>
            </li>
          </ul>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 850.000<span
              class="text-base font-normal"
            >/pax</span></p>
        </div>
      </div>
      {{-- Card 2 --}}
      <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
        <div class="relative">
          <img
            src="{{ url('storage/images/Kelut.jpg') }}"
            alt="Penanggungan"
            class="h-40 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">
          <!-- label trip -->
          <span
            class="bg-amber-100 text-amber-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium"
          >Private Trip</span>

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Mount Kelud</h4>
          </div>

          <ul class="mt-2 flex flex-col gap-2">
            <li class="flex items-center gap-2">
              <svg
                class="text-gray-600 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                />
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">Blitar</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">Up to 3 Days</p>
            </li>
          </ul>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 850.000<span
              class="text-base font-normal"
            >/pax</span></p>
        </div>
      </div>
      {{-- Card 1 --}}
      <div class="bg-white overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl cursor-pointer">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-40 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">
          <!-- label trip -->
          <span
            class="bg-amber-100 text-amber-800 me-2 rounded-full px-2.5 pb-1 pt-0.5 text-xs font-medium"
          >Family Gathering</span>

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Gunung Penanggungan</h4>
          </div>

          <ul class="mt-2 flex flex-col gap-2">
            <li class="flex items-center gap-2">
              <svg
                class="text-gray-600 h-4 w-4"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                />
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">Mojokerto</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M8 7V3m8 4V3m-9 8h10m-11 4h12m-15 4h18M5 7h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">26 October 2025</p>
            </li>

            <li class="flex items-center gap-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="text-gray-500 h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <p class="text-gray-500 text-sm font-medium">3 Days</p>
            </li>
          </ul>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 350.000<span
              class="text-base font-normal"
            >/pax</span></p>
        </div>
      </div>
    </div>
</section>
