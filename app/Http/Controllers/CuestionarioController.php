<?php

namespace App\Http\Controllers;

use App\Models\RespuestaCuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuestionarioController extends Controller
{
    // Funciones GET para mostrar vistas
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

    // Funciones POST para procesar respuestas
    public function submitUsoDirecto(Request $request)
{
    session(['respuestas.seccion1' => $request->only('pregunta1', 'pregunta2')]);
    session(['puntuacion' => array_sum($request->only('pregunta1', 'pregunta2'))]);
    return redirect()->route('alimentos');
}
    public function submitAlimentos(Request $request) {
        session(['respuestas.seccion2' => $request->only('pregunta3', 'pregunta4')]);
        return redirect()->route('productosybienes');
    }

    public function submitProductosyBienes(Request $request) {
        session(['respuestas.seccion3' => $request->only('pregunta5', 'pregunta6')]);
        return redirect()->route('transporte');
    }

    public function submitTransporte(Request $request) {
        session(['respuestas.seccion4' => $request->only('pregunta7')]);
        return redirect()->route('electrodomesticos');
    }

    public function submitElectrodomesticos(Request $request) {
        session(['respuestas.seccion5' => $request->only('pregunta8', 'pregunta9', 'pregunta10')]);
        return redirect()->route('hogar');
    }

    public function submitHogar(Request $request) {
        session(['respuestas.seccion6' => $request->only('pregunta11', 'pregunta12')]);
        return redirect()->route('energia');
    }

    public function submitEnergia(Request $request) {
        session(['respuestas.seccion7' => $request->only('pregunta13', 'pregunta14')]);
        return redirect()->route('jardineria');
    }

    public function submitJardineria(Request $request) {
        session(['respuestas.seccion8' => $request->only('pregunta15', 'pregunta16')]);
        return redirect()->route('papel');
    }

    public function submitPapel(Request $request) {
        session(['respuestas.seccion9' => $request->only('pregunta17', 'pregunta18')]);
        return redirect()->route('viajes');
    }

    public function submitViajes(Request $request) {
        session(['respuestas.seccion10' => $request->only('pregunta19', 'pregunta20')]);
        return redirect()->route('puntaje');
    }

    // Procesar resultados finales
  public function resultado()
{
    if (!session()->has('puntuacion')) {
        return redirect()->route('inicio')->with('error', 'Complete el cuestionario primero');
    }

    $puntuacion = session('puntuacion');
    $respuestas = session('respuestas');

    // Calcular datos para las gráficas
    $datosGrafica = [
        'labels' => ['Uso directo', 'Alimentos', 'Productos', 'Transporte', 'Electrodomésticos',
                    'Hogar', 'Energía', 'Jardinería', 'Papel', 'Viajes'],
        'data' => [
            array_sum($respuestas['seccion1'] ?? []),
            array_sum($respuestas['seccion2'] ?? []),
            array_sum($respuestas['seccion3'] ?? []),
            array_sum($respuestas['seccion4'] ?? []),
            array_sum($respuestas['seccion5'] ?? []),
            array_sum($respuestas['seccion6'] ?? []),
            array_sum($respuestas['seccion7'] ?? []),
            array_sum($respuestas['seccion8'] ?? []),
            array_sum($respuestas['seccion9'] ?? []),
            array_sum($respuestas['seccion10'] ?? [])
        ],
        'impacto' => [
            'Alto' => min(100, $puntuacion * 1.5),
            'Medio' => min(80, $puntuacion),
            'Bajo' => min(60, $puntuacion * 0.7)
        ]
    ];

    return view('puntaje', [
        'puntuacion' => $puntuacion,
        'datosGrafica' => $datosGrafica
    ]);
}

private function calcularImpactoAmbiental($puntuacion)
{
    // Escala de impacto (personaliza según tus necesidades)
    return [
        'Alto' => min(100, $puntuacion * 1.5),
        'Medio' => min(80, $puntuacion),
        'Bajo' => min(60, $puntuacion * 0.7)
    ];
}

    // Mostrar puntuaciones
    public function puntuaciones()
    {
        $puntuaciones = RespuestaCuestionario::with('user')
                        ->orderBy('puntuacion_total', 'desc')
                        ->get();

        return view('marcador', compact('puntuaciones'));
    }

    // Mostrar mapa
    public function mostrarMapa()
    {
        $respuesta = RespuestaCuestionario::where('usuario_id', Auth::id())
                        ->latest()
                        ->first();

        if (!$respuesta) {
            return redirect()->route('inicio')->with('error', 'Complete el cuestionario primero');
        }

        return view('mapa', [
            'nivel' => $this->determinarNivelHuella($respuesta->puntuacion_total),
            'puntuacion' => $respuesta->puntuacion_total
        ]);
    }

    // Métodos auxiliares
    private function calcularPuntuacionTotal($respuestas)
    {
        $total = 0;
        foreach ($respuestas as $seccion => $preguntas) {
            $total += array_sum(array_values($preguntas));
        }
        return $total;
    }

    private function determinarNivelHuella($puntuacion)
    {
        if ($puntuacion <= 30) return 'baja';
        if ($puntuacion <= 45) return 'moderada';
        if ($puntuacion <= 55) return 'alta';
        return 'muy_alta';
    }
}