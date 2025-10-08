@props(['name', 'title' => '', 'maxWidth' => '2xl', 'show' => false])

@php
  $maxWidthClass = [
      'sm' => 'sm:max-w-sm',
      'md' => 'sm:max-w-md',
      'lg' => 'sm:max-w-lg',
      'xl' => 'sm:max-w-xl',
      '2xl' => 'sm:max-w-2xl',
      '3xl' => 'sm:max-w-3xl',
      '4xl' => 'sm:max-w-4xl',
      '5xl' => 'sm:max-w-5xl',
  ][$maxWidth];
@endphp

<div
  x-data="{ show: @js($show) }"
  x-on:open-modal.window="$event.detail === '{{ $name }}' ? show = true : null"
  x-on:close-modal.window="$event.detail === '{{ $name }}' ? show = false : null"
  x-show="show"
  x-cloak
  class="fixed inset-0 z-60 overflow-y-auto"
  style="display: none;"
>
  <!-- Backdrop -->
  <div
    x-show="show"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="bg-gray-900 fixed inset-0 bg-opacity-50 transition-opacity"
    @click="show = false"
  ></div>

  <!-- Modal Content -->
  <div class="flex min-h-full items-center justify-center p-4">
    <div
      x-show="show"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      class="bg-white {{ $maxWidthClass }} relative w-full transform overflow-hidden rounded-xl shadow-xl transition-all"
      @click.away="show = false"
    >
      <!-- Header -->
      @if ($title)
        <div class="border-gray-200 flex items-center justify-between border-b p-6">
          <h3 class="text-gray-900 text-lg font-semibold">{{ $title }}</h3>
          <button
            type="button"
            @click="show = false"
            class="text-gray-400 hover:text-gray-600 transition-colors"
          >
            <i class="fas fa-times text-xl"></i>
          </button>
        </div>
      @endif

      <!-- Body -->
      <div class="p-6">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>
