@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 9. Consumo de bienes y productos de papel</h1>

        <form action="{{ route('cuestionario.submit9') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">17. ¿Con qué frecuencia compras productos de papel (servilletas, toallas de papel, etc.)?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta17" value="1" required> Menos de 1 vez al mes</label><br>
                    <label><input type="radio" name="pregunta17" value="2" required> 1 vez al mes</label><br>
                    <label><input type="radio" name="pregunta17" value="3" required> Más de 2 veces al mes</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">18. ¿Reciclas papel y otros materiales en tu hogar?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta18" value="1" required> Siempre</label><br>
                    <label><input type="radio" name="pregunta18" value="2" required> A veces</label><br>
                    <label><input type="radio" name="pregunta18" value="3" required> Nunca</label>
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
