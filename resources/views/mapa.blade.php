@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="100" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6" id="bodyh1">
    Impacto de la Huella Hídrica
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <p id="mapa" class="text-center mb-4">
      Tu nivel de huella hídrica es: <strong>{{ ucfirst($nivel) }}</strong>
    </p>

    <div class="text-center">
      <div id="map" style="height: 400px;"></div>

      @if ($nivel === 'baja')
        <p id="pmapa" class="text-xl mt-4">Tu huella hídrica es baja. ¡Buen trabajo!</p>
      @elseif ($nivel === 'moderada')
        <p class="text-xl mt-4">Tu huella hídrica es moderada. Considera reducir tu consumo.</p>
      @elseif ($nivel === 'alta')
        <p class="text-xl mt-4">Tu huella hídrica es alta. Considera reducir tu consumo.</p>
      @else
        <p id="pmapa" class="text-xl mt-4">Tu huella hídrica es muy alta. ¡Es urgente tomar medidas!</p>
      @endif
    </div>

    <div class="text-center mt-6">
      <a href="{{ route('cuestionario.puntaje') }}"
         class="px-5 py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700 transition">
        Volver
      </a>
    </div>
  </div>

  {{-- Leaflet --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <script>
    // Inicializa el mapa
    var map = L.map('map').setView([19.4326, -99.1332], 5);

    // Capa base
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Datos de ejemplo
    var ciudades = [
      { nombre: 'Ciudad de México', lat: 19.4326, lon: -99.1332, nivel: 'baja' },
      { nombre: 'Los Ángeles', lat: 34.0522, lon: -118.2437, nivel: 'moderada' },
      { nombre: 'Nueva York', lat: 40.7128, lon: -74.0060, nivel: 'alta' },
      { nombre: 'Londres', lat: 51.5074, lon: -0.1278, nivel: 'muy_alta' }
    ];

    var colores = { baja: 'green', moderada: 'orange', alta: 'red', muy_alta: 'darkred' };

    ciudades.forEach(function(ciudad) {
      var marcador = L.marker([ciudad.lat, ciudad.lon]).addTo(map)
        .bindPopup("<b>" + ciudad.nombre + "</b><br>Huella hídrica: " + ciudad.nivel);

      marcador.setIcon(L.divIcon({
        className: 'custom-icon',
        iconSize: [20, 20],
        iconAnchor: [10, 10],
        popupAnchor: [0, -10],
        html: `<div style="background-color:${colores[ciudad.nivel]}; border-radius:50%; width:20px; height:20px;"></div>`
      }));
    });
  </script>
@endsection
