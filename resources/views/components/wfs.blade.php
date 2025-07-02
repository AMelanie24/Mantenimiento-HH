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
    </head>
    <body class="mb-4 font-sans text-gray-900 antialiased ')]">
        <div class="bg-gradient-to-r from-cyan-500 to-teal-300 px-9 py-[6px] m-2 rounded-xl">
            <nav >
                <ul class="flex justify-between items-center">
                    <li class="text-2xl font-mono max-w-[50px]"> 
                        <a href="/">
                            <img src="assets\images\logo.png" alt=""></a> 
                    </li>
                    <li class="text-white font-semibold">REGISTRO</li>
                    <li class="text-white font-semibold">INICIO</li>
                </ul>
            </nav>
        </div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
