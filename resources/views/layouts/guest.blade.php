<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-blue-400 via-cyan-400 to-teal-300 font-sans antialiased relative">

    {{-- Ondas del fondo (si ya tienes este parcial, perfecto; si no, quítalo) --}}
    @includeIf('partials.waves')

    {{-- Contenedor centrado --}}
    <div class="relative z-10 flex min-h-screen items-center justify-center px-4">
        {{ $slot }}
    </div>
</body>
</html>
