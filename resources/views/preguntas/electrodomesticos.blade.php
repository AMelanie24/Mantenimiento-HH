@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 5. Uso de electrodomésticos y hábitos de limpieza</h1>

        <form action="{{ route('cuestionario.submit5') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">8. ¿Con qué frecuencia utilizas la lavadora?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta8" value="1" required> Menos de 1 vez por semana</label><br>
                    <label><input type="radio" name="pregunta8" value="2" required> 1-2 veces por semana</label><br>
                    <label><input type="radio" name="pregunta8" value="3" required> Más de 3 veces por semana</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">9. ¿Con qué frecuencia usas el lavavajillas?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta9" value="1" required> No uso lavavajillas</label><br>
                    <label><input type="radio" name="pregunta9" value="2" required> 1-2 veces por semana</label><br>
                    <label><input type="radio" name="pregunta9" value="3" required> Más de 3 veces a la semana</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">10. ¿Cómo lavas tu auto?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta10" value="1" required> No lavo el auto o lo llevo a una estación con reciclaje de agua</label><br>
                    <label><input type="radio" name="pregunta10" value="2" required> Lo lavo a mano usando baldes</label><br>
                    <label><input type="radio" name="pregunta10" value="3" required> Lo lavo con manguera</label>
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
