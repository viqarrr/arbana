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

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>

<body class="font-sans antialiased">
  <x-banner />

  <div class="bg-gray-100 min-h-screen">
    <x-app.header></x-app.header>
    <x-app.sidebar></x-app.sidebar>
    
    <div class="w-full lg:ps-64">
      <div class="space-y-4 p-4 sm:space-y-6 sm:p-6">
        @if (isset($header))
        @endif
        {{ $slot }}
      </div>
    </div>
  </div>

  @stack('modals')

  @livewireScripts
</body>

</html>
