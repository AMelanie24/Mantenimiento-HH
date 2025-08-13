@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="100" />
@endsection

@php
    $max = 60;
    $score = (int) ($puntuacion ?? 0);
    $score = max(0, min($score, $max));

    // Categorías por rango
    if ($score <= 15) {
        $categoria = ['label' => 'Baja', 'color' => 'text-emerald-600', 'bg'=>'bg-emerald-50'];
    } elseif ($score <= 30) {
        $categoria = ['label' => 'Media', 'color' => 'text-amber-600', 'bg'=>'bg-amber-50'];
    } elseif ($score <= 45) {
        $categoria = ['label' => 'Alta', 'color' => 'text-orange-600', 'bg'=>'bg-orange-50'];
    } else {
        $categoria = ['label' => 'Muy alta', 'color' => 'text-red-600', 'bg'=>'bg-red-50'];
    }

    // % para el anillo
    $percent = round(($score / $max) * 100);
    $circum = 2 * M_PI * 56; // radio 56
    $dash = ($percent / 100) * $circum;

    // Desglose con máximos por sección (si no llega, ponemos 0)
    $bk = $breakdown ?? [];
    $breakdownRows = [
        ['t' => 'Uso directo',       'v' => $bk['usodirecto'] ?? 0, 'max' => 6],
        ['t' => 'Alimentos',         'v' => $bk['alimentos']  ?? 0, 'max' => 6],
        ['t' => 'Productos y bienes','v' => $bk['productos']  ?? 0, 'max' => 6],
        ['t' => 'Transporte',        'v' => $bk['transporte'] ?? 0, 'max' => 3],
        ['t' => 'Electrodomésticos', 'v' => $bk['electro']    ?? 0, 'max' => 9],
        ['t' => 'Hogar',             'v' => $bk['hogar']      ?? 0, 'max' => 6],
        ['t' => 'Energía',           'v' => $bk['energia']    ?? 0, 'max' => 6],
        ['t' => 'Jardinería',        'v' => $bk['jardin']     ?? 0, 'max' => 6],
        ['t' => 'Papel',             'v' => $bk['papel']      ?? 0, 'max' => 6],
        ['t' => 'Viajes',            'v' => $bk['viajes']     ?? 0, 'max' => 6],
    ];

    // Acciones de alto impacto (ejemplo)
    $acciones = [
        ['txt' => 'Duchas de 5–7 min',                                  'ahorro' => 40],
        ['txt' => 'Llenar lavadora/lavavajillas antes de usar',         'ahorro' => 30],
        ['txt' => 'Reducir carne roja a 1–2 veces por semana',          'ahorro' => 80],
    ];
@endphp

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Resumen de tu Huella Hídrica
  </h1>

  <div class="w-full max-w-3xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto space-y-8">

    {{-- Tarjeta principal con anillo y resumen --}}
    <div class="grid md:grid-cols-2 gap-6 items-center">
      <div class="flex justify-center">
        <svg viewBox="0 0 140 140" class="w-48 h-48">
          <circle cx="70" cy="70" r="56" class="stroke-slate-200 fill-none" stroke-width="12"></circle>
          <circle cx="70" cy="70" r="56"
                  class="fill-none stroke-teal-600"
                  stroke-width="12" stroke-linecap="round"
                  stroke-dasharray="{{ $dash }} {{ $circum - $dash }}"
                  transform="rotate(-90 70 70)"></circle>
          <text x="70" y="68" text-anchor="middle" class="fill-slate-900" font-size="22" font-weight="800">{{ $score }}</text>
          <text x="70" y="88" text-anchor="middle" class="fill-slate-500" font-size="12">de {{ $max }}</text>
        </svg>
      </div>

      <div class="space-y-3">
        <p class="text-sm text-slate-500">Tu huella hídrica total</p>
        <p class="text-4xl font-extrabold tracking-tight">
          {{ $score }} / {{ $max }} <span class="text-slate-400 text-lg">({{ $percent }}%)</span>
        </p>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full {{ $categoria['bg'] }}">
          <span class="w-2.5 h-2.5 rounded-full {{ str_replace('text', 'bg', $categoria['color']) }}"></span>
          <span class="text-sm font-semibold {{ $categoria['color'] }}">Categoría: {{ $categoria['label'] }}</span>
        </div>
        <p class="text-slate-600">
          Este valor refleja tu consumo total de agua según tus actividades diarias.
        </p>

        {{-- Acciones principales --}}
        <div class="flex flex-wrap gap-3 pt-2">
          <a href="{{ route('mapa.mostrar') }}"
             class="px-4 py-2 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
            Ver mapa
          </a>
          <a href="{{ route('plan') }}"
             class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
            Generar plan de ahorro
          </a>
          <a href="{{ route('reporte.pdf') }}"
             class="px-4 py-2 rounded-lg bg-slate-800 text-white font-semibold hover:bg-slate-900">
            Descargar PDF
          </a>
          <a href="{{ route('inicio') }}"
             class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
            Volver al inicio
          </a>
        </div>
      </div>
    </div>

    {{-- Desglose por secciones --}}
    <div>
      <h2 class="text-lg font-bold text-slate-800 mb-3">¿Dónde se concentra tu huella?</h2>
      <div class="space-y-3">
        @foreach ($breakdownRows as $b)
          @php
            $pct = $b['max'] > 0 ? round(($b['v'] / $b['max']) * 100) : 0;
          @endphp
          <div>
            <div class="flex justify-between text-sm mb-1">
              <span class="font-medium">{{ $b['t'] }}</span>
              <span class="text-slate-500">{{ $b['v'] }} / {{ $b['max'] }} ({{ $pct }}%)</span>
            </div>
            <div class="w-full h-2 rounded bg-slate-200 overflow-hidden">
              <div class="h-2 bg-teal-600" style="width: {{ $pct }}%"></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- Acciones de alto impacto --}}
    <div>
      <h2 class="text-lg font-bold text-slate-800 mb-3">Acciones de alto impacto (estimación)</h2>
      <ul class="grid md:grid-cols-3 gap-3">
        @foreach ($acciones as $a)
          <li class="rounded-xl border border-slate-200 p-4">
            <p class="font-semibold text-slate-800">{{ $a['txt'] }}</p>
            <p class="text-sm text-slate-500">~ {{ $a['ahorro'] }} L/día</p>
          </li>
        @endforeach
      </ul>
    </div>

  </div>
@endsection
