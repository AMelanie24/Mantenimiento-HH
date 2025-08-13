<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>7. Energía y calefacción</title>
</head>
<body>
    <div id="contenedorp">
        <h1>Sección 7. Uso de energía y calefacción</h1>
        <div id="pregunta">
            <form action="{{ route('cuestionario.submit7') }}" method="POST">
                @csrf
                <label for="pregunta13">13. ¿Qué tipo de energía utilizas principalmente en tu hogar?</label><br>
                <input type="radio" name="pregunta13" value="1" required> Energía renovable <br>
                <input type="radio" name="pregunta13" value="2" required> Gas natural <br>
                <input type="radio" name="pregunta13" value="3" required> Carbón o energía fósil <br><br>

                <label for="pregunta14">14. ¿Tienes calefacción o aire acondicionado central?</label><br>
                <input type="radio" name="pregunta14" value="1" required> No uso calefacción o aire acondicionado <br>
                <input type="radio" name="pregunta14" value="2" required> Uso calefacción o aire acondicionado de manera eficiente <br>
                <input type="radio" name="pregunta14" value="3" required> Uso calefacción o aire acondicionado de manera intensiva <br><br>

                <button type="submit" id="startButton">Siguiente</button>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
