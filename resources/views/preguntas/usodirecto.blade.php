<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>1. Consumo directo de agua</title>
</head>
<body>
    <div id="contenedorp">
        <h1>Sección 1. Consumo directo de agua</h1>
        <div id="pregunta">
            <form action="{{ route('cuestionario.submit1') }}" method="POST">
                @csrf
                <label for="pregunta1">1. ¿Cuántos litros de agua consumes diariamente para beber?</label><br>
                <input type="radio" name="pregunta1" value="1" required> Menos de 2 litros <br>
                <input type="radio" name="pregunta1" value="2" required> 2-3 litros <br>
                <input type="radio" name="pregunta1" value="3" required> Más de 3 litros <br><br>

                <label for="pregunta2">2. ¿Con qué frecuencia te duchas o bañas?</label><br>
                <input type="radio" name="pregunta2" value="1" required> Menos de 3 veces a la semana <br>
                <input type="radio" name="pregunta2" value="2" required> 1 vez cada dos días <br>
                <input type="radio" name="pregunta2" value="3" required> 1 vez al día <br><br>

                <button type="submit" id="startButton">Siguiente</button>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
