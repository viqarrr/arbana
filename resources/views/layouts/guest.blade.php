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
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Spicy+Rice&display=swap"
    rel="stylesheet"
  />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>

<body>
  <x-navbar></x-navbar>
  <div class="text-gray-900 font-display overflow-x-hidden antialiased">
    {{ $slot }}
  </div>
  <x-footer></x-footer>

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</body>

</html>
