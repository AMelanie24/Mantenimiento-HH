@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-2xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 4. Transporte</h1>

        <form action="{{ route('cuestionario.submit4') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">7. ¿Qué medio de transporte utilizas con mayor frecuencia?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta7" value="1" required> Transporte público o bicicleta</label><br>
                    <label><input type="radio" name="pregunta7" value="2" required> Automóvil compartido</label><br>
                    <label><input type="radio" name="pregunta7" value="3" required> Automóvil propio o moto</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-full shadow-md transition">
                    Siguiente
                </button>
            </div>
        </form>
    </div>
@endsection
