@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 7. Uso de energía y calefacción</h1>

        <form action="{{ route('cuestionario.submit7') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">13. ¿Qué tipo de energía utilizas principalmente en tu hogar?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta13" value="1" required> Energía renovable</label><br>
                    <label><input type="radio" name="pregunta13" value="2" required> Gas natural</label><br>
                    <label><input type="radio" name="pregunta13" value="3" required> Carbón o energía fósil</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">14. ¿Tienes calefacción o aire acondicionado central?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta14" value="1" required> No uso calefacción o aire acondicionado</label><br>
                    <label><input type="radio" name="pregunta14" value="2" required> Uso calefacción o aire acondicionado de manera eficiente</label><br>
                    <label><input type="radio" name="pregunta14" value="3" required> Uso calefacción o aire acondicionado de manera intensiva</label>
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
