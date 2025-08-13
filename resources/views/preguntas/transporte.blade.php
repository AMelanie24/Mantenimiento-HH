<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>4. Transporte</title>
</head>
<body>
    <div id="contenedorp">
        <h1>Sección 4. Transporte</h1>
        <div id="pregunta">
            <form action="{{ route('cuestionario.submit4') }}" method="POST">
                @csrf
                <label for="pregunta7"> 7. ¿Qué medio de transporte utilizas con mayor frecuencia?</label><br>
                <input type="radio" name="pregunta7" value="1" required> Transporte público o bicicleta <br>
                <input type="radio" name="pregunta7" value="2" required> Automóvil compartido <br>
                <input type="radio" name="pregunta7" value="3" required> Automóvil propio o moto <br><br>

                <button type="submit" id="startButton">Siguiente</button>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
