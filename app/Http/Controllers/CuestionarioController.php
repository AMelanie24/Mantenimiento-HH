<?php

namespace App\Http\Controllers;

use App\Models\RespuestaCuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuestionarioController extends Controller
{
    // ====== VISTAS ======

    public function usodirecto() {
        // Limpia respuestas previas al iniciar el cuestionario
        session()->forget('respuestas');
        return view('preguntas.usodirecto');
    }

    public function alimentos()          { return view('preguntas.alimentos'); }
    public function productosybienes()   { return view('preguntas.productosybienes'); }
    public function transporte()         { return view('preguntas.transporte'); }
    public function electrodomesticos()  { return view('preguntas.electrodomesticos'); }
    public function hogar()              { return view('preguntas.hogar'); }
    public function energia()            { return view('preguntas.energia'); }
    public function jardineria()         { return view('preguntas.jardineria'); }
    public function papel()              { return view('preguntas.papel'); }
    public function viajes()             { return view('preguntas.viajes'); }

    // ====== SUBMITS ======

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

    // ====== RESULTADO ======

    public function resultado(Request $request) {
        $bloques = session('respuestas', []);

        // Aplana y valida 1..3
        $planas = [];
        foreach ($bloques as $bloque) {
            foreach ($bloque as $k => $v) {
                $vi = (int) $v;
                if ($vi >= 1 && $vi <= 3) {
                    $planas[$k] = $vi;
                }
            }
        }

        // Subtotales por sección
        $seccion1  = ($planas['pregunta1']  ?? 0) + ($planas['pregunta2']  ?? 0);                 // 6
        $seccion2  = ($planas['pregunta3']  ?? 0) + ($planas['pregunta4']  ?? 0);                 // 6
        $seccion3  = ($planas['pregunta5']  ?? 0) + ($planas['pregunta6']  ?? 0);                 // 6
        $seccion4  = ($planas['pregunta7']  ?? 0);                                               // 3
        $seccion5  = ($planas['pregunta8']  ?? 0) + ($planas['pregunta9']  ?? 0) + ($planas['pregunta10'] ?? 0); // 9
        $seccion6  = ($planas['pregunta11'] ?? 0) + ($planas['pregunta12'] ?? 0);               // 6
        $seccion7  = ($planas['pregunta13'] ?? 0) + ($planas['pregunta14'] ?? 0);               // 6
        $seccion8  = ($planas['pregunta15'] ?? 0) + ($planas['pregunta16'] ?? 0);               // 6
        $seccion9  = ($planas['pregunta17'] ?? 0) + ($planas['pregunta18'] ?? 0);               // 6
        $seccion10 = ($planas['pregunta19'] ?? 0) + ($planas['pregunta20'] ?? 0);               // 6

        $puntuacion = $seccion1 + $seccion2 + $seccion3 + $seccion4 + $seccion5
                    + $seccion6 + $seccion7 + $seccion8 + $seccion9 + $seccion10;

        // Tope de seguridad
        $puntuacion = min($puntuacion, 60);

        // Guarda
        $respuestaCuestionario = new RespuestaCuestionario();
        $respuestaCuestionario->usuario_id = Auth::id();
        $respuestaCuestionario->respuestas = $planas; // guarda ya aplanado
        $respuestaCuestionario->puntuacion_total = $puntuacion;
        $respuestaCuestionario->save();

        // Breakdown para la vista
        $breakdown = [
            'usodirecto' => $seccion1,
            'alimentos'  => $seccion2,
            'productos'  => $seccion3,
            'transporte' => $seccion4,
            'electro'    => $seccion5,
            'hogar'      => $seccion6,
            'energia'    => $seccion7,
            'jardin'     => $seccion8,
            'papel'      => $seccion9,
            'viajes'     => $seccion10,
        ];

        return view('puntaje', [
            'puntuacion' => $puntuacion,
            'breakdown'  => $breakdown,
        ]);
    }

    // ====== PLAN DE AHORRO ======

    public function planAhorro()
    {
        $ultima = RespuestaCuestionario::where('usuario_id', Auth::id())->latest()->first();

        if (!$ultima) {
            return redirect()->route('intro')->with('error', 'Aún no has completado el cuestionario.');
        }

        // Respuestas guardadas (array aplanado)
        $answers = is_array($ultima->respuestas)
            ? $ultima->respuestas
            : (array) json_decode($ultima->respuestas, true);

        $breakdown = $this->buildBreakdownFromAnswers($answers);

        // Máximos por sección
        $maximos = [
            'usodirecto' => 6, 'alimentos' => 6, 'productos' => 6, 'transporte' => 3,
            'electro' => 9, 'hogar' => 6, 'energia' => 6, 'jardin' => 6, 'papel' => 6, 'viajes' => 6
        ];

        // Ordenar de mayor a menor % de impacto
        $ordenadas = collect($breakdown)
            ->map(fn($v, $k) => [
                'clave' => $k,
                'valor' => $v,
                'max'   => $maximos[$k],
                'pct'   => $maximos[$k] > 0 ? round(($v / $maximos[$k]) * 100) : 0,
            ])
            ->sortByDesc('pct')
            ->values()
            ->all();

        // Recomendaciones por sección (demo)
        $tips = [
            'usodirecto' => [
                ['txt' => 'Duchas de 5–7 minutos', 'ahorro' => 40],
                ['txt' => 'Cierra la llave al cepillarte/enjabonarte', 'ahorro' => 15],
            ],
            'alimentos' => [
                ['txt' => 'Reduce carne roja a 1–2 veces/semana', 'ahorro' => 80],
                ['txt' => 'Prefiere productos locales y de temporada', 'ahorro' => 20],
            ],
            'productos' => [
                ['txt' => 'Compra ropa duradera (menos fast fashion)', 'ahorro' => 15],
                ['txt' => 'Prioriza productos con certificación sostenible', 'ahorro' => 10],
            ],
            'transporte' => [
                ['txt' => 'Usa transporte público/bici 2–3 días a la semana', 'ahorro' => 25],
                ['txt' => 'Comparte coche con compañeros', 'ahorro' => 10],
            ],
            'electro' => [
                ['txt' => 'Usa lavadora/lavavajillas a carga completa', 'ahorro' => 30],
                ['txt' => 'Programas eco y agua fría', 'ahorro' => 20],
            ],
            'hogar' => [
                ['txt' => 'Regadera ahorradora e inodoro de bajo flujo', 'ahorro' => 35],
                ['txt' => 'Repara fugas de inmediato', 'ahorro' => 25],
            ],
            'energia' => [
                ['txt' => 'Aisla ventanas y ajusta termostato', 'ahorro' => 10],
                ['txt' => 'Cambia a LED y apaga standby', 'ahorro' => 5],
            ],
            'jardin' => [
                ['txt' => 'Riego por goteo y mulch', 'ahorro' => 40],
                ['txt' => 'Plantas nativas de bajo consumo', 'ahorro' => 30],
            ],
            'papel' => [
                ['txt' => 'Usa toallas de tela y recicla', 'ahorro' => 8],
                ['txt' => 'Compra papel reciclado', 'ahorro' => 5],
            ],
            'viajes' => [
                ['txt' => 'Sustituye vuelos cortos por tren/bus', 'ahorro' => 25],
                ['txt' => 'Compensa huella y viaja menos frecuente', 'ahorro' => 10],
            ],
        ];

        // Top 3 secciones + 2 tips c/u
        $top = array_slice($ordenadas, 0, 3);
        $recomendaciones = [];
        foreach ($top as $row) {
            $clave = $row['clave'];
            $recomendaciones[] = [
                'seccion' => $clave,
                'titulo'  => ucfirst($clave === 'electro' ? 'Electrodomésticos' : ($clave === 'usodirecto' ? 'Uso directo' : $clave)),
                'pct'     => $row['pct'],
                'tips'    => array_slice($tips[$clave] ?? [], 0, 2),
            ];
        }

        return view('plan', [
            'recomendaciones' => $recomendaciones,
            'ordenadas'       => $ordenadas,
        ]);
    }

    // ====== MARCADOR ======

    public function puntuaciones()
    {
        $puntuaciones = RespuestaCuestionario::with('usuario')->latest()->get();
        return view('marcador', compact('puntuaciones'));
    }

    // ====== MAPA ======

    public function mostrarMapa()
    {
        $respuesta = RespuestaCuestionario::where('usuario_id', Auth::id())->latest()->first();

        if (!$respuesta) {
            return redirect()->route('intro')->with('error', 'Primero completa el cuestionario.');
        }

        $nivel = $this->determinarNivelHuella($respuesta->puntuacion_total);

        return view('mapa', ['nivel' => $nivel]);
    }

    private function determinarNivelHuella($puntuacion)
    {
        if ($puntuacion <= 30) return 'baja';
        if ($puntuacion <= 45) return 'moderada';
        if ($puntuacion <= 55) return 'alta';
        return 'muy_alta';
    }

    // ====== HELPERS ======

    private function buildBreakdownFromAnswers(array $r): array
    {
        $r = array_map(fn($v) => (int)$v, $r);

        $seccion1  = ($r['pregunta1']  ?? 0) + ($r['pregunta2']  ?? 0);
        $seccion2  = ($r['pregunta3']  ?? 0) + ($r['pregunta4']  ?? 0);
        $seccion3  = ($r['pregunta5']  ?? 0) + ($r['pregunta6']  ?? 0);
        $seccion4  = ($r['pregunta7']  ?? 0);
        $seccion5  = ($r['pregunta8']  ?? 0) + ($r['pregunta9']  ?? 0) + ($r['pregunta10'] ?? 0);
        $seccion6  = ($r['pregunta11'] ?? 0) + ($r['pregunta12'] ?? 0);
        $seccion7  = ($r['pregunta13'] ?? 0) + ($r['pregunta14'] ?? 0);
        $seccion8  = ($r['pregunta15'] ?? 0) + ($r['pregunta16'] ?? 0);
        $seccion9  = ($r['pregunta17'] ?? 0) + ($r['pregunta18'] ?? 0);
        $seccion10 = ($r['pregunta19'] ?? 0) + ($r['pregunta20'] ?? 0);

        return [
            'usodirecto' => $seccion1,
            'alimentos'  => $seccion2,
            'productos'  => $seccion3,
            'transporte' => $seccion4,
            'electro'    => $seccion5,
            'hogar'      => $seccion6,
            'energia'    => $seccion7,
            'jardin'     => $seccion8,
            'papel'      => $seccion9,
            'viajes'     => $seccion10,
        ];
    }
}
