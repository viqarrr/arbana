<!-- Family Gathering  -->
<section class="mx-auto max-w-8xl px-4 py-10 lg:py-16 ">
    <div class="flex flex-col md:flex-row md:justify-between md:items-end w-full gap-4 pb-10 pt-20 lg:px-24">
      <div>
        <h1 class="text-3xl font-semibold">Featured Gear</h1>
        <h1 class="text-gray-500 mt-2 text-xl font-normal">
          Discover Featured Outdoor Equipment Rentals for Every Adventure
        </h1>
      </div>
      <div class="flex items-center gap-2 hover:underline">
        <p class="text-lg">See All</p>
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
      <div class="bg-white cursor-pointer overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-52 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Camping Tent</h4>
            <p class="text-sm text-neutral-500 mb-4">Botol tahan panas & dingin untuk hiking.</p>
          </div>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 75.000<span
              class="text-base font-normal"
            >/day</span></p>
        </div>
      </div>
      {{-- Card 1 --}}
      <div class="bg-white cursor-pointer overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-52 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Portable Stove</h4>
            <p class="text-sm text-neutral-500 mb-4">Botol tahan panas & dingin untuk hiking.</p>
          </div>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 30.000<span
              class="text-base font-normal"
            >/day</span></p>
        </div>
      </div>
      {{-- Card 1 --}}
      <div class="bg-white cursor-pointer overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-52 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Water Bottle 1L</h4>
            <p class="text-sm text-neutral-500 mb-4">Botol tahan panas & dingin untuk hiking.</p>
          </div>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 10.000<span
              class="text-base font-normal"
            >/day</span></p>
        </div>
      </div>
      {{-- Card 1 --}}
      <div class="bg-white cursor-pointer overflow-hidden rounded-xl shadow-lg transition hover:shadow-xl">
        <div class="relative">
          <img
            src="{{ url('storage/images/penanggungan.webp') }}"
            alt="Penanggungan"
            class="h-52 w-full object-cover"
          />
        </div>
        <div class="p-4 pt-2">

          <div class="my-3">
            <h4 class="text-gray-900 mb-1 text-lg font-bold leading-tight">Carrier 50L</h4>
            <p class="text-sm text-neutral-500 mb-4">Botol tahan panas & dingin untuk hiking.</p>
          </div>

          <!-- harga -->
          <p class="text-gray-900 mt-4 text-2xl font-extrabold leading-tight">Rp 50.000<span
              class="text-base font-normal"
            >/day</span></p>
        </div>
      </div>
      
    </div>
</section>
