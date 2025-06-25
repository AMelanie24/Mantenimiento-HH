<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcula tu Huella Hídrica</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Gotas animadas */
        .drop {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: fall linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0);
                opacity: 0.8;
            }
            90% {
                opacity: 0.5;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        /* Nubes flotantes */
        @keyframes floatCloud {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-cloud {
            animation: floatCloud 6s ease-in-out infinite;
        }

        .delay-1000 {
            animation-delay: 1s;
        }

        .delay-2000 {
            animation-delay: 2s;
        }

        /* Estilo del menú deslizable */
        #menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 250px;
            height: 100%;
            background-color: #2d3748;
            color: white;
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }

        #menu.open {
            transform: translateX(0);
        }

        #menu a, #menu button {
            margin: 20px;
            color: white;
            font-size: 18px;
            text-decoration: none;
        }

        #menu a:hover, #menu button:hover {
            color: #38b2ac;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-400 via-cyan-400 to-teal-300 h-screen overflow-hidden font-sans relative">

    {{-- Gotas de lluvia animadas --}}
    @for ($i = 0; $i < 35; $i++)
        <div class="drop"
             style="top: {{ rand(-100, -10) }}px;
                    left: {{ rand(0, 100) }}%;
                    animation-duration: {{ rand(5, 12) }}s;
                    animation-delay: {{ rand(0, 10) }}s;">
        </div>
    @endfor

    {{-- Ondas verdes múltiples y superpuestas al fondo --}}
    <div class="absolute bottom-0 left-0 w-full h-60 md:h-80 overflow-hidden leading-none z-0">
        <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#6EE7B7" fill-opacity="1"
                d="M0,192L48,192C96,192,192,192,288,181.3C384,171,480,149,576,149.3C672,149,768,171,864,181.3C960,192,1056,192,1152,197.3C1248,203,1344,213,1392,218.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" />
        </svg>
        <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#34D399" fill-opacity="0.85"
                d="M0,288L48,266.7C96,245,192,203,288,192C384,181,480,203,576,218.7C672,235,768,245,864,250.7C960,256,1056,256,1152,245.3C1248,235,1344,213,1392,202.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" />
        </svg>
        <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="#10B981" fill-opacity="0.7"
                d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,197.3C672,213,768,235,864,240C960,245,1056,235,1152,208C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" />
        </svg>
    </div>

    {{-- Menú hamburguesa en la esquina --}}
    <div class="absolute top-4 right-4 z-10">
        <button id="menu-toggle" class="text-white text-3xl focus:outline-none">
            &#9776; <!-- Icono de menú hamburguesa -->
        </button>
    </div>

    {{-- Menú deslizable --}}
    <div id="menu" class="fixed top-0 right-0 bg-teal-600 text-white w-64 h-full z-20 transform translate-x-full transition-all duration-300 ease-in-out">
        <div class="flex flex-col items-center p-6 mt-16 space-y-6">
            <a href="{{ route('profile.edit') }}" class="text-lg">Ver Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-lg bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">Cerrar Sesión</button>
            </form>
        </div>
    </div>

    {{-- Contenido central --}}
    <div class="absolute inset-0 flex items-center justify-center z-10">
        <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-12 text-white">
            
            {{-- Imagen de huella --}}
            <img src="{{ asset('img/2.png') }}" alt="Huella" class="w-32 md:w-40 animate-pulse" />

            {{-- Texto y botón --}}
            <div class="text-center space-y-6">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow">
                    CALCULA TU <br> HUELLA HÍDRICA
                </h1>
                <a href="{{ route('usodirecto') }}"
                   class="inline-block bg-white text-blue-700 hover:bg-blue-100 font-semibold text-lg px-10 py-3 rounded-full shadow-lg transition duration-300 ease-in-out">
                    INICIO
                </a>
            </div>

            {{-- Imagen de huella --}}
            <img src="{{ asset('img/2.png') }}" alt="Huella" class="w-32 md:w-40 animate-pulse" />
        </div>
    </div>

    <script>
        // Funcionalidad para abrir/cerrar el menú
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var menu = document.getElementById('menu');
            menu.classList.toggle('translate-x-full');
        });
    </script>

</body>
</html>
