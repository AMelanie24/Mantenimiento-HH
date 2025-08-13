<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body class="font-sans antialiased min-h-screen bg-blue-50 text-slate-900">

  {{-- Navbar del sitio --}}
  @include('layouts.navigation')

  {{-- Progreso (opcional). Si tu vista pone <x-progress ... />, se verá aquí --}}
  <div class="pt-2">
    @yield('progress')
  </div>

  {{-- Contenido centrado --}}
  <main class="min-h-[calc(100vh-4rem)] flex items-start md:items-center">
    <div class="w-full max-w-3xl mx-auto px-4 py-8 md:py-12">
      @yield('content')
    </div>
  </main>

  @stack('scripts')
</body>
</html>
