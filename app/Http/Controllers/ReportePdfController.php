<?php

namespace App\Http\Controllers;

use App\Models\RespuestaCuestionario;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportePdfController extends Controller
{
    public function descargar()
    {
        $respuesta = RespuestaCuestionario::where('usuario_id', Auth::id())
                    ->latest()->first();

        if (!$respuesta) {
            return redirect()->route('intro')
                ->with('error', 'Aún no tienes respuestas para generar el reporte.');
        }

        // Datos base
        $puntuacion = (int) $respuesta->puntuacion_total;      // 0..60
        $res = (array) $respuesta->respuestas;                 // aplanadas (pregunta1..20)

        // Recalcular breakdown por sección (mismos que en resultado)
        $bk = [
            'usodirecto' => ($res['pregunta1'] ?? 0) + ($res['pregunta2'] ?? 0),
            'alimentos'  => ($res['pregunta3'] ?? 0) + ($res['pregunta4'] ?? 0),
            'productos'  => ($res['pregunta5'] ?? 0) + ($res['pregunta6'] ?? 0),
            'transporte' => ($res['pregunta7'] ?? 0),
            'electro'    => ($res['pregunta8'] ?? 0) + ($res['pregunta9'] ?? 0) + ($res['pregunta10'] ?? 0),
            'hogar'      => ($res['pregunta11'] ?? 0) + ($res['pregunta12'] ?? 0),
            'energia'    => ($res['pregunta13'] ?? 0) + ($res['pregunta14'] ?? 0),
            'jardin'     => ($res['pregunta15'] ?? 0) + ($res['pregunta16'] ?? 0),
            'papel'      => ($res['pregunta17'] ?? 0) + ($res['pregunta18'] ?? 0),
            'viajes'     => ($res['pregunta19'] ?? 0) + ($res['pregunta20'] ?? 0),
        ];

        // Nivel
        $nivel = $this->nivel($puntuacion);

        // TOP 3 secciones
        $orden = collect($bk)->sortDesc();
        $top3 = $orden->take(3)->map(function($v, $k){
            $map = [
                'usodirecto'=>'Uso directo', 'alimentos'=>'Alimentos',
                'productos'=>'Productos y bienes', 'transporte'=>'Transporte',
                'electro'=>'Electrodomésticos', 'hogar'=>'Hogar',
                'energia'=>'Energía', 'jardin'=>'Jardinería',
                'papel'=>'Papel', 'viajes'=>'Viajes'
            ];
            return ['clave'=>$k,'titulo'=>$map[$k]??$k,'score'=>$v];
        })->values()->all();

        // Recomendaciones (simple; puedes usar tu misma lógica del “plan”)
        $recomendaciones = $this->recomendaciones($orden);

        $data = [
            'usuario'       => Auth::user(),
            'puntuacion'    => $puntuacion,
            'nivel'         => $nivel,
            'breakdown'     => $bk,
            'respuestas'    => $res,
            'top3'          => $top3,
            'recomendaciones'=> $recomendaciones,
            'fecha'         => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('pdf.reporte', $data)
                  ->setPaper('a4', 'portrait')
                  ->set_option('isRemoteEnabled', true); // por si usas logos remotos

        $filename = 'Huella_Hidrica_'.now()->format('Ymd_His').'.pdf';
        return $pdf->download($filename);
    }

    private function nivel($p)
    {
        if ($p <= 30) return 'Baja';
        if ($p <= 45) return 'Moderada';
        if ($p <= 55) return 'Alta';
        return 'Muy alta';
    }

    private function recomendaciones($orden)
    {
        // Devuelve array estructurado: [ [titulo, tips[]], ...]
        // Ejemplo básico; ajusta a tu contenido real
        $tips = [
            'usodirecto' => ['Ducha < 7 min','Cierra el grifo al cepillarte'],
            'alimentos'  => ['Reduce carne roja','Elige alimentos locales'],
            'productos'  => ['Compra con menos empaque','Reutiliza/recicla'],
            'transporte' => ['Usa transporte público','Comparte coche'],
            'electro'    => ['Cargas completas en lavadora','Evita manguera'],
            'hogar'      => ['Detecta fugas','Instala aireadores'],
            'energia'    => ['Aísla ventanas','Cambia a LED'],
            'jardin'     => ['Riego por goteo','Riega temprano'],
            'papel'      => ['Compra reciclado','Digitaliza'],
            'viajes'     => ['Evita vuelos cortos','Prefiere tren/bus'],
        ];

        return $orden->take(3)->map(function($v, $k) use ($tips){
            $titulos = [
                'usodirecto'=>'Uso directo', 'alimentos'=>'Alimentos', 'productos'=>'Productos y bienes',
                'transporte'=>'Transporte', 'electro'=>'Electrodomésticos', 'hogar'=>'Hogar',
                'energia'=>'Energía', 'jardin'=>'Jardinería', 'papel'=>'Papel', 'viajes'=>'Viajes'
            ];
            return [
                'titulo' => $titulos[$k] ?? $k,
                'tips'   => $tips[$k] ?? [],
            ];
        })->values()->all();
    }
}
