<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuestionarioController;
use App\Http\Controllers\HuellaHidricaController;

Route::get('/', function () {
    return view('home');
})->name('inicio');


Route::get('/dashboard', function () {
    return view('preguntas/usodirecto');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/addquestion', function () {
    return view('agregar');
});

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