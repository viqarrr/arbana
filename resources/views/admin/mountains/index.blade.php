@extends('layouts.app')

<x-slot name="header">
  <h2 class="text-gray-800 text-xl font-semibold leading-tight">
    {{ __('Mountains') }}
  </h2>
</x-slot>

@section('content')
  <div class="mb-4">
    <a
      href="{{ route('admin.mountains.create') }}"
      class="bg-blue-500 hover:bg-blue-700 text-white rounded px-4 py-2 font-bold"
    >
      Add New Mountain
    </a>
  </div>

  <div class="bg-white overflow-hidden rounded-lg shadow-md">
    <table class="divide-gray-200 min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Region</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MDPL</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Images</th>
          <th class="text-gray-500 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-gray-200 divide-y">
        @foreach ($mountains as $mountain)
          <tr>
            <td class="text-gray-900 whitespace-nowrap px-6 py-4 text-sm font-medium">
              {{ $mountain->name }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $mountain->region }}
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ number_format($mountain->mdpl) }} m
            </td>
            <td class="text-gray-500 whitespace-nowrap px-6 py-4 text-sm">
              {{ $mountain->mountainImages->count() }} images
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
              <a
                href="{{ route('admin.mountains.show', $mountain) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >View</a>
              <a
                href="{{ route('admin.mountains.edit', $mountain) }}"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
              >Edit</a>
              <form
                action="{{ route('admin.mountains.destroy', $mountain) }}"
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
    {{ $mountains->links() }}
  </div>
@endsection
