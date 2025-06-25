@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-center">Sección 1: Consumo directo de agua</h1>

    <div class="w-full max-w-xl bg-white bg-opacity-90 text-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('cuestionario.submit1') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="pregunta1" class="block font-semibold mb-2">1. ¿Cuántos litros de agua consumes diariamente para beber?</label>
                <div class="space-y-2">
                    <label class="block">
                        <input type="radio" name="pregunta1" value="1" required class="mr-2"> Menos de 2 litros
                    </label>
                    <label class="block">
                        <input type="radio" name="pregunta1" value="2" required class="mr-2"> 2-3 litros
                    </label>
                    <label class="block">
                        <input type="radio" name="pregunta1" value="3" required class="mr-2"> Más de 3 litros
                    </label>
                </div>
            </div>

            <div>
                <label for="pregunta2" class="block font-semibold mb-2">2. ¿Con qué frecuencia te duchas o bañas?</label>
                <div class="space-y-2">
                    <label class="block">
                        <input type="radio" name="pregunta2" value="1" required class="mr-2"> Menos de 3 veces a la semana
                    </label>
                    <label class="block">
                        <input type="radio" name="pregunta2" value="2" required class="mr-2"> 1 vez cada dos días
                    </label>
                    <label class="block">
                        <input type="radio" name="pregunta2" value="3" required class="mr-2"> 1 vez al día
                    </label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-300">
                    Siguiente
                </button>
            </div>
        </form>
    </div>
@endsection
