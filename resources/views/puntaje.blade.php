@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800 mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600" id="punth2">Resumen de tu Huella Hídrica</h2>
        
        <div id="contenido-huella" class="space-y-4">
            <h1 class="text-xl font-semibold text-gray-700">Tu huella hídrica es de:</h1>
            <p class="text-4xl font-extrabold text-indigo-600"><strong>{{ $puntuacion }}</strong> de 60</p>
            <p class="text-gray-500">
                Este valor refleja tu consumo total de agua según tus actividades diarias.
            </p>
        </div>

        <div class="text-center mt-8">
            <a href="mapa">
                <button class="bg-teal-600 text-white py-2 px-6 rounded-full font-semibold hover:bg-teal-700 transition-all duration-300 transform hover:scale-105">
                    Ver más detalles
                </button>
            </a>
        </div>
    </div>
@endsection
