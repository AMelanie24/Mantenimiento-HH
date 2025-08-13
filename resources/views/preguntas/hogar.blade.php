<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-3xl text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">Sección 6. Uso de agua en el hogar</h1>

        <form action="{{ route('cuestionario.submit6') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold">11. ¿Cuánto tiempo te tomas en la ducha?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta11" value="1" required> Menos de 5 minutos</label><br>
                    <label><input type="radio" name="pregunta11" value="2" required> 5-10 minutos</label><br>
                    <label><input type="radio" name="pregunta11" value="3" required> Más de 10 minutos</label>
                </div>
            </div>

            <div>
                <label class="block font-semibold">12. ¿Tienes sistemas de ahorro de agua instalados (regaderas ahorradoras, inodoros de bajo flujo)?</label>
                <div class="mt-2 space-y-1">
                    <label><input type="radio" name="pregunta12" value="1" required> Sí</label><br>
                    <label><input type="radio" name="pregunta12" value="2" required> Parcialmente</label><br>
                    <label><input type="radio" name="pregunta12" value="3" required> No</label>
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>6. Uso de agua en el hogar</title>
</head>
<body>
    <div id="contenedorp">
        <h1>Sección 6. Uso de agua en el hogar</h1>
        <div id="pregunta">
            <form action="{{ route('cuestionario.submit6') }}" method="POST">
                @csrf
                <label for="pregunta11">11. ¿Cuánto tiempo te tomas en la ducha?</label><br>
                <input type="radio" name="pregunta11" value="1" required> Menos de 5 minutos <br>
                <input type="radio" name="pregunta11" value="2" required> 5-10 minutos <br>
                <input type="radio" name="pregunta11" value="3" required> Más de 10 minutos <br><br>
                
                <label for="pregunta12">12. ¿Tienes sistemas de ahorro de agua instalados (regaderas ahorradoras, inodoros de bajo flujo)?</label><br>
                <input type="radio" name="pregunta12" value="1" required> Sí <br>
                <input type="radio" name="pregunta12" value="2" required> Parcialmente <br>
                <input type="radio" name="pregunta12" value="3" required> No <br><br>

                <button type="submit" id="startButton">Siguiente</button>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
