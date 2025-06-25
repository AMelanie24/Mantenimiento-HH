<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gradient-to-b from-blue-400 via-cyan-400 to-teal-300 overflow-hidden relative">

    {{-- Gotas --}}
    @for ($i = 0; $i < 35; $i++)
        <div class="drop absolute"
             style="top: {{ rand(-100, -10) }}px;
                    left: {{ rand(0, 100) }}%;
                    animation-duration: {{ rand(5, 12) }}s;
                    animation-delay: {{ rand(0, 10) }}s;"></div>
    @endfor

    {{-- Ondas verdes al fondo --}}
    <div class="absolute bottom-0 left-0 w-full h-60 md:h-80 overflow-hidden leading-none z-0 pointer-events-none">
        @include('partials.waves')
    </div>

    {{-- Contenido principal --}}
    <div class="relative z-10 min-h-screen flex flex-col justify-center items-center text-white px-4">
        @yield('content')
    </div>

    {{-- Estilos para gotas --}}
    <style>
        .drop {
            width: 6px;
            height: 6px;
            background-color: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% { transform: translateY(0); opacity: 0.8; }
            90% { opacity: 0.5; }
            100% { transform: translateY(100vh); opacity: 0; }
        }
    </style>

    @stack('scripts')
</body>
</html>
