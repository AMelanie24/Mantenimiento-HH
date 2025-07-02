@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-2xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 3. Consumo de productos y bienes</h1>

        <form action="{{ route('cuestionario.submit3') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">5. ¿Con qué frecuencia compras ropa nueva?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta5" value="1" required> Menos de 1 vez al año</label><br>
                    <label><input type="radio" name="pregunta5" value="2" required> 1-2 veces al año</label><br>
                    <label><input type="radio" name="pregunta5" value="3" required> Más de 3 veces al año</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">6. ¿Con qué frecuencia compras productos electrónicos (teléfonos, computadoras, etc.)?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta6" value="1" required> Rara vez o nunca</label><br>
                    <label><input type="radio" name="pregunta6" value="2" required> 1 cada 2-3 años</label><br>
                    <label><input type="radio" name="pregunta6" value="3" required> Más de 1 vez al año</label>
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
