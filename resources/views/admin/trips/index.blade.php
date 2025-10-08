@extends('layouts.app')

<x-slot name="header">
  <h2 class="text-gray-800 text-xl font-semibold leading-tight">
    {{ __('Trips') }}
  </h2>
</x-slot>

@section('content')
  <div class="mb-4">
    <a
      href="{{ route('admin.trips.create') }}"
      class="bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2 font-bold"
    >
      Add New Trip
    </a>
  </div>

  <div class="bg-white overflow-hidden rounded-lg shadow-md">
    <table class="divide-gray-200 min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Title</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Mountain</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Type</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-gray-200 divide-y">
        @foreach ($trips as $trip)
          <tr>
            <td class="text-gray-900 whitespace-nowrap px-6 py-4 text-sm font-medium">
              {{ $trip->title }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $trip->mountain->name }}
            </td>
            <td class="whitespace-nowrap px-6 py-4">
              <span
                class="{{ $trip->type === 'open_trip'
                    ? 'bg-green-100 text-green-800'
                    : ($trip->type === 'private_trip'
                        ? 'bg-blue-100 text-blue-800'
                        : 'bg-yellow-100 text-yellow-800') }} inline-flex rounded-full px-2 text-xs font-semibold leading-5"
              >
                {{ ucfirst(str_replace('_', ' ', $trip->type)) }}
              </span>
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              Rp {{ number_format($trip->price, 0, ',', '.') }}
            </td>
            <td class="whitespace-nowrap px-6 py-4">
              <span
                class="{{ $trip->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} inline-flex rounded-full px-2 text-xs font-semibold leading-5"
              >
                {{ ucfirst($trip->status) }}
              </span>
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
              <a
                href="{{ route('admin.trips.show', $trip) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >View</a>
              <a
                href="{{ route('admin.trips.edit', $trip) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >Edit</a>
              <form
                action="{{ route('admin.trips.destroy', $trip) }}"
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
    {{ $trips->links() }}
  </div>
@endsection
