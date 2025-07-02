<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RespuestaCuestionario;

class HuellaHidricaController extends Controller
{

    public function mostrarMapa(){

        $respuesta = RespuestaCuestionario::where('usuario_id', auth()->id())
                                          ->latest()
                                          ->first();

        if (!$respuesta) {
            return redirect()->route('cuestionario')->with('error', 'No se encontraron datos de huella hídrica.');
        }

        $nivel = 'baja';
        if ($respuesta->huella_hidrica > 4000) {
            $nivel = 'muy alta';
        } elseif ($respuesta->huella_hidrica > 2500) {
            $nivel = 'alta';
        } elseif ($respuesta->huella_hidrica > 1500) {
            $nivel = 'moderada';
        }

        return view('mapa', compact('nivel'));
    }

    
}
