<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-2xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 2. Consumo de alimentos</h1>

        <form action="{{ route('cuestionario.submit2') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">3. ¿Cuánto consumo de carne tienes semanalmente?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta3" value="1" required> Ninguna</label><br>
                    <label><input type="radio" name="pregunta3" value="2" required> 1-2 veces por semana</label><br>
                    <label><input type="radio" name="pregunta3" value="3" required> Más de 3 veces a la semana</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">4. ¿Qué proporción de tus alimentos son productos procesados?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta4" value="1" required> Pocos o ninguno</label><br>
                    <label><input type="radio" name="pregunta4" value="2" required> Algunos alimentos procesados</label><br>
                    <label><input type="radio" name="pregunta4" value="3" required> Muchos alimentos procesados</label>
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
=======
<!-- resources/views/pregunta/cuestionario.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>2. Consumo de alimentos</title>
</head>
<body>
    <div id="contenedorp">
        <h1>Seccion 2. Consumo de alimentos</h1>
        <div id="pregunta">
            <form action="{{ route('cuestionario.submit2') }}" method="POST" id="form">
                @csrf
                <label for="pregunta3" id="">3. ¿Cuánto consumo de carne tienes semanalmente?</label><br>
                <input type="radio" name="pregunta3" value="1" required> Ninguna <br>
                <input type="radio" name="pregunta3" value="2" required> 1-2 veces por semana <br>
                <input type="radio" name="pregunta3" value="3" required> Más de 3 veces a la semana <br><br>

                
                <label for="pregunta4">4. ¿Qué proporción de tus alimentos son productos procesados?</label><br>
                <input type="radio" name="pregunta4" value="1" required> Pocos o ninguno <br>
                <input type="radio" name="pregunta4" value="2" required> Algunos alimentos procesados <br>
                <input type="radio" name="pregunta4" value="3" required> Muchos alimentos procesados <br><br>

                <button type="submit" id="startButton">Siguiente</button>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
