<x-app-layout>
  <x-slot name="header">{{ __('Perjalanan') }}</x-slot>
  <div
    class="[&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 flex flex-1 flex-col overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2"
  >
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="border-gray-200 flex min-w-0 flex-1 flex-col border-e">
        <div class="bg-white border-gray-200 flex flex-col p-4">
          <div class="bg-white flex flex-col p-4">

            <!-- Header -->
            <div class="border-gray-200 flex flex-wrap items-center justify-between gap-2 border-b border-dashed pb-2">
              <div class="sm:col-span-1">
                <label
                  for="hs-as-table-product-review-search"
                  class="sr-only"
                >Search</label>
                <div class="relative">
                  <input
                    type="text"
                    id="hs-as-table-product-review-search"
                    name="hs-as-table-product-review-search"
                    class="border-gray-200 focus:border-blue-500 focus:ring-blue-500 block w-full rounded-lg px-3 py-2 ps-11 text-sm disabled:pointer-events-none disabled:opacity-50"
                    placeholder="Search"
                  >
                  <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
                    <svg
                      class="text-gray-400 size-4 shrink-0"
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <circle
                        cx="11"
                        cy="11"
                        r="8"
                      />
                      <path d="m21 21-4.3-4.3" />
                    </svg>
                  </div>
                </div>
              </div>

              <button
                type="button"
                class="border-gray-200 text-gray-800 hover:bg-indigo-50 hover:border-indigo-100 hover:text-indigo-700 focus:bg-indigo-50 focus:border-indigo-100 focus:text-indigo-700 flex items-center justify-center gap-x-1.5 rounded-lg border px-2.5 py-1 py-1.5 text-[13px] focus:outline-none"
              >
                <svg
                  class="size-3.5 shrink-0"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"></path>
                  <path d="M21 3v5h-5"></path>
                </svg>
                Refresh
              </button>
            </div>
            <!-- End Header -->

            <!-- Data -->
            <div class="space-y-4">
              @foreach ($bookings as $booking)
                <div class="bg-white border-gray-200 rounded-xl border p-6 transition-shadow hover:shadow-md">
                  <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <!-- Booking Info -->
                    <div class="flex-1">
                      <div class="mb-3 flex items-start justify-between">
                        <div>
                          <div class="mb-2 flex items-center space-x-3">
                            <span class="text-gray-500 text-sm font-medium">Booking #{{ $booking->id }}</span>
                            @if ($booking->status === 'confirmed')
                              <span
                                class="bg-green-100 text-green-800 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                              >
                                <span class="bg-green-600 mr-1.5 h-1.5 w-1.5 rounded-full"></span>
                                Confirmed
                              </span>
                            @elseif($booking->status === 'cancelled')
                              <span
                                class="bg-red-100 text-red-800 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                              >
                                <span class="bg-red-600 mr-1.5 h-1.5 w-1.5 rounded-full"></span>
                                Cancelled
                              </span>
                            @else
                              <span
                                class="bg-yellow-100 text-yellow-800 inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                              >
                                <span class="bg-yellow-600 mr-1.5 h-1.5 w-1.5 rounded-full"></span>
                                Pending
                              </span>
                            @endif
                          </div>
                          <h3 class="text-gray-900 mb-1 text-lg font-semibold">{{ $booking->trip->title }}</h3>
                          <p class="text-gray-600 flex items-center text-sm">
                            <i class="ti ti-mountain text-gray-400 mr-1.5"></i>
                            {{ $booking->trip->destination->name }}
                          </p>
                        </div>
                      </div>

                      <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                        <div>
                          <p class="text-gray-500 mb-1 text-xs">Contact</p>
                          <p class="text-gray-900 text-sm font-medium">{{ $booking->contact_name }}</p>
                          <p class="text-gray-600 text-xs">{{ $booking->contact_phone }}</p>
                        </div>
                        <div>
                          <p class="text-gray-500 mb-1 text-xs">Participants</p>
                          <p class="text-gray-900 text-sm font-medium">{{ $booking->pax_count }} people</p>
                        </div>
                        <div>
                          <p class="text-gray-500 mb-1 text-xs">Departure</p>
                          <p class="text-gray-900 text-sm font-medium">
                            {{ $booking->departure_date ? $booking->departure_date->format('M j, Y') : 'TBD' }}
                          </p>
                        </div>
                        <div>
                          <p class="text-gray-500 mb-1 text-xs">Total Price</p>
                          <p class="text-gray-900 text-sm font-bold">Rp
                            {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </div>
                      </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col space-y-2 lg:w-48">
                      <form
                        action="{{ route('admin.bookings.update-status', $booking) }}"
                        method="POST"
                      >
                        @csrf
                        @method('PATCH')
                        <select
                          name="status"
                          onchange="this.form.submit()"
                          class="border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full rounded-lg px-3 py-2 text-sm"
                        >
                          <option
                            value="pending"
                            {{ $booking->status === 'pending' ? 'selected' : '' }}
                          >Pending</option>
                          <option
                            value="confirmed"
                            {{ $booking->status === 'confirmed' ? 'selected' : '' }}
                          >Confirm</option>
                          <option
                            value="cancelled"
                            {{ $booking->status === 'cancelled' ? 'selected' : '' }}
                          >Cancel</option>
                        </select>
                      </form>

                      <div class="flex space-x-2">
                        <a
                          href="{{ route('admin.bookings.show', $booking) }}"
                          class="text-gray-700 bg-white border-gray-300 hover:bg-gray-50 inline-flex flex-1 items-center justify-center rounded-lg border px-3 py-2 text-sm font-medium"
                        >
                          <i class="ti ti-eye mr-1.5"></i>
                          View
                        </a>
                        <form
                          action="{{ route('admin.bookings.destroy', $booking) }}"
                          method="POST"
                          class="inline-block"
                        >
                          @csrf
                          @method('DELETE')
                          <button
                            type="submit"
                            onclick="return confirm('Are you sure?')"
                            class="text-red-600 hover:bg-red-50 border-gray-300 inline-flex items-center justify-center rounded-lg border p-2"
                          >
                            <i class="ti ti-trash text-lg"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <!-- End Data -->

            <!-- Pagination -->
            <div class="mt-6">
              {{ $bookings->links() }}
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Body -->
      </div>
</x-app-layout>
