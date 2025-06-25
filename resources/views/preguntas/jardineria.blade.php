@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 8. Jardinería y cuidado de áreas verdes</h1>

        <form action="{{ route('cuestionario.submit8') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">15. ¿Cómo mantienes tu jardín o áreas verdes?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta15" value="1" required> No tengo jardín o uso plantas autóctonas y riego mínimo</label><br>
                    <label><input type="radio" name="pregunta15" value="2" required> Uso sistema de riego eficiente</label><br>
                    <label><input type="radio" name="pregunta15" value="3" required> Uso manguera o riego manual frecuente</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">16. ¿Con qué frecuencia riegas el césped o jardín?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta16" value="1" required> Nunca o cuando llueve</label><br>
                    <label><input type="radio" name="pregunta16" value="2" required> 1-2 veces por semana</label><br>
                    <label><input type="radio" name="pregunta16" value="3" required> Diariamente</label>
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
