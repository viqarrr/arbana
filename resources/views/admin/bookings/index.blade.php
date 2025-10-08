@extends('layouts.app')

<x-slot name="header">
  <h2 class="text-gray-800 text-xl font-semibold leading-tight">
    {{ __('Bookings') }}
  </h2>
</x-slot>

@section('content')
  <div class="mb-4 flex items-center justify-between">
    <div>
      <a
        href="{{ route('admin.bookings.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2 font-bold"
      >
        Add New Booking
      </a>
    </div>

    <!-- Filter Form -->
    <form
      method="GET"
      class="flex items-center space-x-2"
    >
      <select
        name="status"
        class="rounded border px-3 py-2"
      >
        <option value="">All Status</option>
        <option
          value="pending"
          {{ request('status') === 'pending' ? 'selected' : '' }}
        >Pending</option>
        <option
          value="confirmed"
          {{ request('status') === 'confirmed' ? 'selected' : '' }}
        >Confirmed</option>
        <option
          value="cancelled"
          {{ request('status') === 'cancelled' ? 'selected' : '' }}
        >Cancelled</option>
      </select>
      <button
        type="submit"
        class="bg-gray-500 hover:bg-gray-700 text-white rounded px-4 py-2 font-bold"
      >
        Filter
      </button>
    </form>
  </div>

  <div class="bg-white overflow-hidden rounded-lg shadow-md">
    <table class="divide-gray-200 min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Contact</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Trip</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Pax</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-gray-200 divide-y">
        @foreach ($bookings as $booking)
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
              {{ $booking->trip->title }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $booking->pax_count }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              Rp {{ number_format($booking->total_price, 0, ',', '.') }}
            </td>
            <td class="whitespace-nowrap px-6 py-4">
              <form
                action="{{ route('admin.bookings.update-status', $booking) }}"
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
                href="{{ route('admin.bookings.show', $booking) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >View</a>
              <form
                action="{{ route('admin.bookings.destroy', $booking) }}"
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
    {{ $bookings->links() }}
  </div>
@endsection
