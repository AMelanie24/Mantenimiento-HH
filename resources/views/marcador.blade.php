<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntuaciones del Cuestionario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Puntuaciones del Cuestionario</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Puntuación</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntuaciones as $key => $puntuacion)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if ($puntuacion->usuario)
                                {{ $puntuacion->usuario->name }}
                            @else
                                Usuario Anónimo
                            @endif
                        </td>
                        <td>{{ $puntuacion->puntuacion }}</td>
                        <td>{{ $puntuacion->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
