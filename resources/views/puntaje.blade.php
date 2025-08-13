<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg w-full max-w-4xl mx-auto">
    <h2 class="text-xl font-bold mb-4 text-center text-indigo-600">Resumen de tu Huella Hídrica</h2>
    
    @isset($datosGrafica)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <!-- Gráfica 1 -->
        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold mb-2 text-gray-700">Distribución por sección</h3>
            <div class="grafica-container">
                <canvas id="graficaPuntaje"></canvas>
            </div>
        </div>
        
        <!-- Gráfica 2 -->
        <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold mb-2 text-gray-700">Impacto ambiental</h3>
            <div class="grafica-container">
                <canvas id="graficaImpacto"></canvas>
            </div>
        </div>
    </div>

    <div class="bg-blue-50 p-3 rounded-lg mb-4 text-center">
        <p class="text-lg font-semibold text-blue-800">
            Tu puntuación total: <span class="text-2xl">{{ $puntuacion ?? 0 }}</span>/60
        </p>
    </div>
    @else
    <div class="text-center py-6 bg-red-50 rounded-lg">
        <p class="text-red-500 font-medium">No se encontraron datos para mostrar</p>
        <a href="{{ route('inicio') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">
            ← Volver al cuestionario
        </a>
    </div>
    @endisset

    <div class="flex flex-col sm:flex-row justify-center gap-3 mt-5">
        @isset($datosGrafica)
        <button onclick="generarPDF()" 
                class="bg-red-600 text-white py-2 px-4 rounded-full text-sm font-medium hover:bg-red-700 transition-colors">
            <i class="fas fa-file-pdf mr-1"></i> Descargar PDF
        </button>
        @endisset
        
        <a href="{{ route('mapa.mostrar') }}" 
           class="bg-teal-600 text-white py-2 px-4 rounded-full text-sm font-medium hover:bg-teal-700 transition-colors text-center">
            <i class="fas fa-map mr-1"></i> Ver mapa
        </a>
    </div>
</div>

@isset($datosGrafica)
@push('styles')
<style>
    .grafica-container {
        width: 100%;
        height: 180px;
        position: relative;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<script>
    // Gráfica 1
    new Chart(document.getElementById('graficaPuntaje'), {
        type: 'bar',
        data: {
            labels: @json($datosGrafica['labels']),
            datasets: [{
                label: 'Puntos',
                data: @json($datosGrafica['data']),
                backgroundColor: 'rgba(79, 70, 229, 0.7)',
                borderWidth: 1,
                barThickness: 20
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { font: { size: 10 } }
                }
            },
            scales: {
                y: { beginAtZero: true, max: 10, ticks: { font: { size: 9 } } },
                x: { ticks: { font: { size: 9 } } }
            }
        }
    });

    // Gráfica 2
    new Chart(document.getElementById('graficaImpacto'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(@json($datosGrafica['impacto'])),
            datasets: [{
                data: Object.values(@json($datosGrafica['impacto'])),
                backgroundColor: [
                    'rgba(220, 38, 38, 0.7)',
                    'rgba(234, 179, 8, 0.7)',
                    'rgba(34, 197, 94, 0.7)'
                ],
                borderWidth: 1,
                radius: '70%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
            plugins: {
                legend: {
                    labels: { font: { size: 10 } }
                }
            }
        }
    });

    function generarPDF() {
        const element = document.querySelector('.bg-white');
        html2pdf().from(element).save('huella_hidrica.pdf');
    }
</script>
@endpush
@endisset
@endsection
=======
<!-- layouts/app.blade.php -->
<x-app-layout>
<head> 
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="puntuacionbody">
    <div class="container">
        <div id="resultado">
            <h2 id="punth2">Resumen de tu Huella Hídrica</h2>
            <div id="contenido-huella">
                <h1>Tu huella hídrica es de:</h1>
                <p><strong> {{ $puntuacion }} </strong> de 60</p>
                <p class="descripcion">
                    Este valor refleja tu consumo total de agua según tus actividades diarias.
                </p>
            </div>
            <a href="mapa"><button class="submit" id="startButton">Ver más detalles</button>
        </div>
    </div>
</body>
</x-app-layout>

      

>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
