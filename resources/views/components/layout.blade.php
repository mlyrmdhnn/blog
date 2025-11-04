<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module" defer></script>
    <title>{{ $title }}</title>
</head>
<body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  ```
-->
<div class="min-h-full">

    {{-- navbar --}}
    <x-navbar/>

    {{-- header --}}
    <x-header :title=$title/>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    {{ $slot }}
        </div>
    </main>

  </div>

  {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>