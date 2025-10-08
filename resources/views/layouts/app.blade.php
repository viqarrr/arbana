<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1"
  >
  <meta
    name="csrf-token"
    content="{{ csrf_token() }}"
  >

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link
    rel="preconnect"
    href="https://fonts.bunny.net"
  >
  <link
    href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />
  @stack('styles')

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])


  <!-- Styles -->
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <x-banner />
  <div class="bg-gray-100 min-h-screen">
    <!-- Page Content -->
    <main
      x-data="{ open: true }"
      class="pt-13 px-3 pb-3 transition-all duration-300 lg:fixed lg:inset-0 lg:ps-60"
    >
      <x-app.header></x-app.header>
      <x-app.sidebar></x-app.sidebar>
      <div
        class="[calc(100dvh-62px)] bg-white border-gray-200 shadow-xs flex flex-col overflow-hidden rounded-lg border lg:h-full"
      >
        @if (isset($header))
          <div class="bg-white border-gray-200 flex flex-wrap items-center gap-2 border-b px-4 py-3">
            <button
              @click.stop="open = !open"
              type="button"
              class="border-gray-200 text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 flex size-8 items-center justify-center gap-x-2 rounded-lg border disabled:pointer-events-none disabled:opacity-50 lg:hidden"
              aria-haspopup="dialog"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="sr-only">Toggle Navigation</span>
              <svg
                class="size-4 shrink-0"
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
                <rect
                  width="18"
                  height="18"
                  x="3"
                  y="3"
                  rx="2"
                />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
              </svg>
            </button>
            <h2 class="text-gray-800 text-lg font-medium leading-tight">
              {{ $header }}
            </h2>
          </div>
        @endif
        {{ $slot }}
      </div>
    </main>
  </div>


  @stack('modals')
  @livewireScripts
  @stack('scripts')
</body>

</html>
