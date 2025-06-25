<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HuellaHidricaController;
use App\Models\RespuestaCuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CuestionarioController extends Controller
{
    //Funciones get
    public function usodirecto() {
        return view('preguntas.usodirecto');
    }

    public function alimentos() {
        return view('preguntas.alimentos');
    }

    public function productosybienes() {
        return view('preguntas.productosybienes');
    }

    public function transporte() {
        return view('preguntas.transporte');
    }

    public function electrodomesticos() {
        return view('preguntas.electrodomesticos');
    }

    public function hogar() {
        return view('preguntas.hogar');
    }

    public function energia() {
        return view('preguntas.energia');
    }

    public function jardineria() {
        return view('preguntas.jardineria');
    }

    public function papel() {
        return view('preguntas.papel');
    }

    public function viajes() {
        return view('preguntas.viajes');
    }


    //Funciones submit
    public function submitUsoDirecto(Request $request) {
        session()->push('respuestas', $request->only('pregunta1', 'pregunta2'));
        return redirect()->route('alimentos');
    }

    public function submitAlimentos(Request $request) {
        session()->push('respuestas', $request->only('pregunta3', 'pregunta4'));
        return redirect()->route('productosybienes');
    }

    public function submitProductosyBienes(Request $request) {
        session()->push('respuestas', $request->only('pregunta5', 'pregunta6'));
        return redirect()->route('transporte');
    }

    public function submitTransporte(Request $request) {
        session()->push('respuestas', $request->only('pregunta7'));
        return redirect()->route('electrodomesticos');
    }

    public function submitElectrodomesticos(Request $request) {
        session()->push('respuestas', $request->only('pregunta8', 'pregunta9', 'pregunta10'));
        return redirect()->route('hogar');
    }

    public function submitHogar(Request $request) {
        session()->push('respuestas', $request->only('pregunta11', 'pregunta12'));
        return redirect()->route('energia');
    }

    public function submitEnergia(Request $request) {
        session()->push('respuestas', $request->only('pregunta13', 'pregunta14'));
        return redirect()->route('jardineria');
    }

    public function submitJardineria(Request $request) {
        session()->push('respuestas', $request->only('pregunta15', 'pregunta16'));
        return redirect()->route('papel');
    }

    public function submitPapel(Request $request) {
        session()->push('respuestas', $request->only('pregunta17', 'pregunta18'));
        return redirect()->route('viajes');
    }

    public function submitViajes(Request $request) {
        session()->push('respuestas', $request->only('pregunta19', 'pregunta20'));
        return redirect()->route('cuestionario.puntaje');
    }


    public function resultado(Request $request) {
        $respuestas = session('respuestas');
        $puntuacion = 0;

        foreach ($respuestas as $respuesta) {
            $puntuacion += array_sum($respuesta);
        }

        $usuarioId = Auth::id();

        $respuestaCuestionario = new RespuestaCuestionario();
        $respuestaCuestionario->usuario_id = $usuarioId;
        $respuestaCuestionario->respuestas = $respuestas;  
        $respuestaCuestionario->puntuacion_total = $puntuacion; 
        $respuestaCuestionario->save();

        return view('puntaje', ['puntuacion' => $puntuacion]);
        return redirect()->route('cuestionario.puntuacion');
    }

    public function puntuaciones($puntuacion)
    {
        $puntuacion = RespuestaCuestionario::with('usuario')->get();

        return view('marcador', compact('puntuaciones'));
    }

  public function mostrarMapa()
{
    $respuesta = RespuestaCuestionario::where('usuario_id', Auth::id())->latest()->first();

    if (!$respuesta) {
        return redirect()->route('cuestionario')->with('error', 'No se encontró ninguna respuesta. Por favor, completa el cuestionario primero.');
    }

    $nivel = $this->determinarNivelHuella($respuesta->puntuacion_total);

    return view('mapa', [
        'nivel' => $nivel,
    ]);
}


    private function determinarNivelHuella($puntuacion)
    {
        if ($puntuacion <= 30) {
            return 'baja'; 
        } elseif ($puntuacion <= 45) {
            return 'moderada'; 
        } elseif ($puntuacion <= 55) {
            return 'alta'; 
        } else {
            return 'muy_alta'; 
        }
    }
}
