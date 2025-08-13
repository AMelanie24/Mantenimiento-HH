<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\HuellaHidricaController;
use App\Http\Controllers\IntroduccionController;
use App\Http\Controllers\ReportePdfController;


// ----------------------
// Rutas públicas
// ----------------------
// Login/registro vienen de auth.php
require __DIR__.'/auth.php';

// Si alguien entra a "/" sin login, el middleware auth lo mandará a /login,
// pero si quieres, puedes dejar un atajo explícito:
// Route::redirect('/', '/login');

// Mapa público (si lo quieres privado, muévelo abajo)
Route::get('/mapa', [CuestionarioController::class, 'mostrarMapa'])->name('mapa.mostrar');

// ----------------------
// Rutas protegidas (requieren login)
// ----------------------
Route::middleware(['auth'])->group(function () {

    // HOME (pantalla de inicio)
    Route::get('/', function () {
        return view('home');
    })->name('inicio');

    // INTRO (pantalla intermedia)
    Route::get('/intro', [IntroduccionController::class, 'index'])->name('intro');

     Route::get('/plan', [CuestionarioController::class, 'planAhorro'])->name('plan');
     Route::get('/reporte/pdf', [ReportePdfController::class, 'descargar'])
    ->name('reporte.pdf')
    ->middleware('auth');

    // Dashboard de ejemplo (si no lo usas, puedes quitarlo)
    Route::get('/dashboard', function () {
        return view('preguntas/usodirecto');
    })->middleware(['verified'])->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Sección 1
    Route::get('/usodirecto', [CuestionarioController::class, 'usodirecto'])->name('usodirecto');
    Route::post('/usodirecto', [CuestionarioController::class, 'submitUsoDirecto'])->name('cuestionario.submit1');

    // Sección 2
    Route::get('/alimentos', [CuestionarioController::class, 'alimentos'])->name('alimentos');
    Route::post('/alimentos', [CuestionarioController::class, 'submitAlimentos'])->name('cuestionario.submit2');

    // Sección 3
    Route::get('/productosybienes', [CuestionarioController::class, 'productosybienes'])->name('productosybienes');
    Route::post('/productosybienes', [CuestionarioController::class, 'submitProductosyBienes'])->name('cuestionario.submit3');

    // Sección 4
    Route::get('/transporte', [CuestionarioController::class, 'transporte'])->name('transporte');
    Route::post('/transporte', [CuestionarioController::class, 'submitTransporte'])->name('cuestionario.submit4');

    // Sección 5
    Route::get('/electrodomesticos', [CuestionarioController::class, 'electrodomesticos'])->name('electrodomesticos');
    Route::post('/electrodomesticos', [CuestionarioController::class, 'submitElectrodomesticos'])->name('cuestionario.submit5');

    // Sección 6
    Route::get('/hogar', [CuestionarioController::class, 'hogar'])->name('hogar');
    Route::post('/hogar', [CuestionarioController::class, 'submitHogar'])->name('cuestionario.submit6');

    // Sección 7
    Route::get('/energia', [CuestionarioController::class, 'energia'])->name('energia');
    Route::post('/energia', [CuestionarioController::class, 'submitEnergia'])->name('cuestionario.submit7');

    // Sección 8
    Route::get('/jardineria', [CuestionarioController::class, 'jardineria'])->name('jardineria');
    Route::post('/jardineria', [CuestionarioController::class, 'submitJardineria'])->name('cuestionario.submit8');

    // Sección 9
    Route::get('/papel', [CuestionarioController::class, 'papel'])->name('papel');
    Route::post('/papel', [CuestionarioController::class, 'submitPapel'])->name('cuestionario.submit9');

    // Sección 10
    Route::get('/viajes', [CuestionarioController::class, 'viajes'])->name('viajes');
    Route::post('/viajes', [CuestionarioController::class, 'submitViajes'])->name('cuestionario.submit10');

    // Resultado y marcador
    Route::match(['get','post'], '/puntaje', [CuestionarioController::class, 'resultado'])->name('cuestionario.puntaje');
    Route::get('/marcador', [CuestionarioController::class, 'puntuaciones'])->name('cuestionario.puntuaciones');

    // (opcional) vistas sueltas
    Route::get('/addquestion', fn () => view('agregar'));
    // Si tienes una vista suelta de puntaje adicional y la usas, mantenla aquí protegida:
    // Route::get('/puntaje', fn () => view('puntaje'));
});
