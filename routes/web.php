<?php

use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\CuestionarioController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', function () {
    return view('home');
})->name('inicio');

Route::get('/mapa', [CuestionarioController::class, 'mostrarMapa'])->name('mapa.mostrar');
=======
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\HuellaHidricaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('preguntas/usodirecto');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784

Route::get('/addquestion', function () {
    return view('agregar');
});

<<<<<<< HEAD
// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('preguntas/usodirecto');
    })->name('dashboard');

    // Secciones del cuestionario (GET)
    Route::get('/usodirecto', [CuestionarioController::class, 'usodirecto'])->name('usodirecto');
    Route::get('/alimentos', [CuestionarioController::class, 'alimentos'])->name('alimentos');
    Route::get('/productosybienes', [CuestionarioController::class, 'productosybienes'])->name('productosybienes');
    Route::get('/transporte', [CuestionarioController::class, 'transporte'])->name('transporte');
    Route::get('/electrodomesticos', [CuestionarioController::class, 'electrodomesticos'])->name('electrodomesticos');
    Route::get('/hogar', [CuestionarioController::class, 'hogar'])->name('hogar');
    Route::get('/energia', [CuestionarioController::class, 'energia'])->name('energia');
    Route::get('/jardineria', [CuestionarioController::class, 'jardineria'])->name('jardineria');
    Route::get('/papel', [CuestionarioController::class, 'papel'])->name('papel');
    Route::get('/viajes', [CuestionarioController::class, 'viajes'])->name('viajes');

    // Envío de respuestas (POST) - Protegidas por autenticación
    Route::post('/usodirecto', [CuestionarioController::class, 'submitUsoDirecto'])->name('cuestionario.submit1');
    Route::post('/alimentos', [CuestionarioController::class, 'submitAlimentos'])->name('cuestionario.submit2');
    Route::post('/productosybienes', [CuestionarioController::class, 'submitProductosyBienes'])->name('cuestionario.submit3');
    Route::post('/transporte', [CuestionarioController::class, 'submitTransporte'])->name('cuestionario.submit4');
    Route::post('/electrodomesticos', [CuestionarioController::class, 'submitElectrodomesticos'])->name('cuestionario.submit5');
    Route::post('/hogar', [CuestionarioController::class, 'submitHogar'])->name('cuestionario.submit6');
    Route::post('/energia', [CuestionarioController::class, 'submitEnergia'])->name('cuestionario.submit7');
    Route::post('/jardineria', [CuestionarioController::class, 'submitJardineria'])->name('cuestionario.submit8');
    Route::post('/papel', [CuestionarioController::class, 'submitPapel'])->name('cuestionario.submit9');
    Route::post('/viajes', [CuestionarioController::class, 'submitViajes'])->name('cuestionario.submit10');

    // Resultados
    Route::get('/puntaje', [CuestionarioController::class, 'resultado'])->name('cuestionario.puntaje');
    Route::post('/puntaje', [CuestionarioController::class, 'resultado'])->name('puntaje');
    Route::get('/marcador', [CuestionarioController::class, 'puntuaciones'])->name('cuestionario.puntuaciones');
});

// Ruta de vista de puntaje (pública si lo deseas)
Route::get('/puntaje', function () {
    return view('puntaje');
});

// Ruta para mostrar resultados (GET)
Route::get('/resultados', [CuestionarioController::class, 'mostrarResultados'])
     ->name('cuestionario.puntaje'); // Nombre consistente

// Ruta para mostrar resultados (GET)
Route::get('/puntaje', [CuestionarioController::class, 'resultado'])->name('puntaje');

// Ruta para procesar el último formulario (POST)
Route::post('/procesar-viajes', [CuestionarioController::class, 'submitViajes'])->name('procesar.viajes');
=======
Route::get('/puntaje', function () {
    return view('puntaje');
});
        
require __DIR__.'/auth.php';

//Seccion 1
Route::get('/usodirecto', [CuestionarioController::class, 'usodirecto'])->name('usodirecto');
Route::post('/usodirecto', [CuestionarioController::class, 'submitUsoDirecto'])->name('cuestionario.submit1');

//Seccion 2
Route::get('/alimentos', [CuestionarioController::class, 'alimentos'])->name('alimentos');
Route::post('/alimentos', [CuestionarioController::class, 'submitAlimentos'])->name('cuestionario.submit2');

//Seccion 3
Route::get('/productosybienes', [CuestionarioController::class, 'productosybienes'])->name('productosybienes');
Route::post('/productosybienes', [CuestionarioController::class, 'submitProductosyBienes'])->name('cuestionario.submit3');

//Seccion 4
Route::get('/transporte', [CuestionarioController::class, 'transporte'])->name('transporte');
Route::post('/transporte', [CuestionarioController::class, 'submitTransporte'])->name('cuestionario.submit4');

//Seccion 5
Route::get('/electrodomesticos', [CuestionarioController::class, 'electrodomesticos'])->name('electrodomesticos');
Route::post('/electrodomesticos', [CuestionarioController::class, 'submitElectrodomesticos'])->name('cuestionario.submit5');

//Seccion 6
Route::get('/hogar', [CuestionarioController::class, 'hogar'])->name('hogar');
Route::post('/hogar', [CuestionarioController::class, 'submitHogar'])->name('cuestionario.submit6');

//Seccion 7
Route::get('/energia', [CuestionarioController::class, 'energia'])->name('energia');
Route::post('/energia', [CuestionarioController::class, 'submitEnergia'])->name('cuestionario.submit7');

//Seccion 8
Route::get('/jardineria', [CuestionarioController::class, 'jardineria'])->name('jardineria');
Route::post('/jardineria', [CuestionarioController::class, 'submitJardineria'])->name('cuestionario.submit8');

//Seccion 9
Route::get('/papel', [CuestionarioController::class, 'papel'])->name('papel');
Route::post('/papel', [CuestionarioController::class, 'submitPapel'])->name('cuestionario.submit9');

//Seccion 10
Route::get('/viajes', [CuestionarioController::class, 'viajes'])->name('viajes');
Route::post('/viajes', [CuestionarioController::class, 'submitViajes'])->name('cuestionario.submit10');

//Resultado final
Route::post('/puntaje', [CuestionarioController::class, 'resultado'])->name('puntaje');
Route::get('/puntaje', [CuestionarioController::class, 'resultado'])->name('cuestionario.puntaje');

//Tabla de puntuaciones
Route::get('/marcador', [CuestionarioController::class, 'puntuaciones'])->name('cuestionario.puntuaciones');

// Ruta para los mapas
Route::get('/mapa', [CuestionarioController::class, 'mostrarMapa'])->name('mapa.mostrar');
>>>>>>> 0091282c377ec77e460aa46baed9f508c9bad784
