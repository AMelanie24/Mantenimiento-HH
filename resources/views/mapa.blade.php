@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold text-center mb-6" id="bodyh1">Impacto de la Huella Hídrica</h1>

        <p id="pmapa" class="text-center">
            Tu nivel de huella hídrica es: <strong>{{ ucfirst($nivel) }}</strong>
        </p>

        <div class="text-center">
            <div id="map" style="height: 400px;"></div>

            @if ($nivel === 'baja')
                <p id="pmapa" class="text-xl">Tu huella hídrica es baja. ¡Buen trabajo!</p>
            @elseif ($nivel === 'moderada')
                <p class="text-xl">Tu huella hídrica es moderada. Considera reducir tu consumo.</p>
            @elseif ($nivel === 'alta')
                <p class="text-xl">Tu huella hídrica es alta. Considera reducir tu consumo.</p>
            @else
                <p id="pmapa" class="text-xl">Tu huella hídrica es muy alta. ¡Es urgente tomar medidas!</p>
            @endif
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('puntaje') }}">
                <button class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition">
                    Volver
                </button>
            </a>
        </div>
    </div>

    <!-- Leaflet JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Inicializa el mapa
        var map = L.map('map').setView([19.4326, -99.1332], 5); // Coordenadas de ejemplo (Ciudad de México)

        // Agrega la capa de mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Datos de ciudades y sus niveles de huella hídrica
        var ciudades = [
            { nombre: 'Ciudad de México', lat: 19.4326, lon: -99.1332, nivel: 'baja' },
            { nombre: 'Los Ángeles', lat: 34.0522, lon: -118.2437, nivel: 'moderada' },
            { nombre: 'Nueva York', lat: 40.7128, lon: -74.0060, nivel: 'alta' },
            { nombre: 'Londres', lat: 51.5074, lon: -0.1278, nivel: 'muy_alta' }
        ];

        // Colores por nivel de huella hídrica
        var colores = {
            baja: 'green',
            moderada: 'orange',
            alta: 'red',
            muy_alta: 'darkred'
        };

        // Agregar marcadores interactivos para cada ciudad
        ciudades.forEach(function(ciudad) {
            var marcador = L.marker([ciudad.lat, ciudad.lon]).addTo(map)
                .bindPopup("<b>" + ciudad.nombre + "</b><br>Huella hídrica: " + ciudad.nivel)
                .openPopup();
            
            // Cambiar el color del marcador según el nivel de huella hídrica
            marcador.setIcon(L.divIcon({
                className: 'custom-icon',
                iconSize: [20, 20],
                iconAnchor: [10, 10],
                popupAnchor: [0, -10],
                html: `<div style="background-color:${colores[ciudad.nivel]}; border-radius: 50%; width: 20px; height: 20px;"></div>`
            }));
        });
    </script>
@endsection
