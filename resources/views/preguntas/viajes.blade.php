@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 10. Viajes y transporte a larga distancia</h1>

        <form action="{{ route('cuestionario.submit10') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">19. ¿Con qué frecuencia viajas en avión?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta19" value="1" required> Menos de una vez por año</label><br>
                    <label><input type="radio" name="pregunta19" value="2" required> 1-2 veces al año</label><br>
                    <label><input type="radio" name="pregunta19" value="3" required> Más de 3 veces al año</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">20. ¿Qué tipo de transporte utilizas para distancias largas (más de 100 km)?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta20" value="1" required> Transporte público</label><br>
                    <label><input type="radio" name="pregunta20" value="2" required> Auto compartido</label><br>
                    <label><input type="radio" name="pregunta20" value="3" required> Auto propio</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition">
                    Enviar Respuestas
                </button>
            </div>
        </form>
    </div>
@endsection
