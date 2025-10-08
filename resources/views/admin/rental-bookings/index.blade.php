<x-app-layout>
  <div class="mb-4">
    <a
      href="{{ route('admin.rental-bookings.create') }}"
      class="bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2 font-bold"
    >
      Add New Rental Booking
    </a>
  </div>

  <div class="bg-white overflow-hidden rounded-lg shadow-md">
    <table class="divide-gray-200 min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Contact</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Equipment</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Dates</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Qty/Days</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-gray-200 divide-y">
        @foreach ($rentalBookings as $booking)
          <tr>
            <td class="text-gray-900 whitespace-nowrap px-6 py-4 text-sm font-medium">
              #{{ $booking->id }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              <div>
                <div class="font-medium">{{ $booking->contact_name }}</div>
                <div class="text-gray-400">{{ $booking->contact_phone }}</div>
              </div>
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $booking->equipment->name }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              <div>
                <div>{{ $booking->start_date->format('M j') }} - {{ $booking->end_date->format('M j, Y') }}</div>
              </div>
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $booking->quantity }} × {{ $booking->total_days }} days
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              Rp {{ number_format($booking->total_price, 0, ',', '.') }}
            </td>
            <td class="whitespace-nowrap px-6 py-4">
              <form
                action="{{ route('admin.rental-bookings.update-status', $booking) }}"
                method="POST"
                class="inline"
              >
                @csrf
                @method('PATCH')
                <select
                  name="status"
                  onchange="this.form.submit()"
                  class="{{ $booking->status === 'confirmed'
                      ? 'bg-green-100 text-green-800'
                      : ($booking->status === 'cancelled'
                          ? 'bg-red-100 text-red-800'
                          : 'bg-yellow-100 text-yellow-800') }} rounded-full border-0 px-2 py-1 text-xs"
                >
                  <option
                    value="pending"
                    {{ $booking->status === 'pending' ? 'selected' : '' }}
                  >Pending</option>
                  <option
                    value="confirmed"
                    {{ $booking->status === 'confirmed' ? 'selected' : '' }}
                  >Confirmed</option>
                  <option
                    value="cancelled"
                    {{ $booking->status === 'cancelled' ? 'selected' : '' }}
                  >Cancelled</option>
                </select>
              </form>
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
              <a
                href="{{ route('admin.rental-bookings.show', $booking) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >View</a>
              <form
                action="{{ route('admin.rental-bookings.destroy', $booking) }}"
                method="POST"
                class="inline"
              >
                @csrf
                @method('DELETE')
                <button
                  type="submit"
                  class="text-red-600 hover:text-red-900"
                  onclick="return confirm('Are you sure?')"
                >Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $rentalBookings->links() }}
  </div>
</x-app-layout>
