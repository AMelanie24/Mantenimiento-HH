<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Reporte de Huella Hídrica</title>
  <style>
    *{ box-sizing:border-box; }
    body{ font-family: DejaVu Sans, Arial, sans-serif; color:#111; font-size:12px; }
    h1,h2,h3{ margin:0 0 .4rem 0; }
    .muted{ color:#555; }
    .wrap{ padding:20px; }
    .row{ display:flex; gap:16px; }
    .col{ flex:1; }
    .card{ border:1px solid #e5e7eb; border-radius:10px; padding:14px; }
    .mb8{ margin-bottom:8px; }
    .mb16{ margin-bottom:16px; }
    .mb24{ margin-bottom:24px; }
    .badge{ display:inline-block; padding:4px 8px; border-radius:999px; color:#fff; font-weight:700; }
    .table{ width:100%; border-collapse:collapse; }
    .table th, .table td{ border:1px solid #e5e7eb; padding:6px 8px; }
    .small{ font-size:11px; }
    .center{ text-align:center; }
    .right{ text-align:right; }
    .bar-wrap{ width:100%; height:14px; background:#f3f4f6; border-radius:8px; overflow:hidden; }
    .bar{ height:100%; background:#2563eb; }
    .pill{ display:inline-block; padding:2px 8px; border:1px solid #e5e7eb; border-radius:999px; margin-right:6px; }
    .footer{ position:fixed; bottom:10px; left:20px; right:20px; font-size:10px; color:#666; }
    /* colores nivel */
    .nv-baja{ background:#16a34a; } .nv-moderada{ background:#f59e0b; }
    .nv-alta{ background:#ef4444; } .nv-muy-alta{ background:#991b1b; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="row mb16">
      <div class="col">
        <h1>Reporte de Huella Hídrica</h1>
        <div class="muted small">Generado: {{ $fecha }}</div>
        <div class="muted small">Usuario: {{ $usuario->name }} ({{ $usuario->email }})</div>
      </div>
      <div class="col right">
        @php
          $cls = match($nivel) {
            'Baja' => 'nv-baja', 'Moderada' => 'nv-moderada',
            'Alta' => 'nv-alta', default => 'nv-muy-alta'
          };
        @endphp
        <div class="badge {{ $cls }}">{{ $nivel }}</div>
        <div class="mb8"></div>
        <div>Total puntos</div>
        <div style="font-size:28px; font-weight:800;">{{ $puntuacion }} <span class="muted" style="font-size:16px;">/ 60</span></div>
      </div>
    </div>

    {{-- Gráfica (SVG barras) --}}
    @php
      $maxSeccion = 9; // máximo de una sección (electro tiene 9); normalizamos sobre 9 para escala común
      $labels = [
        'usodirecto'=>'Uso directo','alimentos'=>'Alimentos','productos'=>'Productos y bienes',
        'transporte'=>'Transporte','electro'=>'Electrodomésticos','hogar'=>'Hogar',
        'energia'=>'Energía','jardin'=>'Jardinería','papel'=>'Papel','viajes'=>'Viajes'
      ];
      $w = 520; $h = 160; $pad = 24;
      $bw = 32; $gap = 18;
    @endphp

    <div class="card mb16">
      <h3 class="mb8">Distribución por secciones</h3>
      <svg width="{{ $w }}" height="{{ $h }}">
        @php $i=0; @endphp
        @foreach ($breakdown as $k => $v)
          @php
            $x = $pad + $i*($bw+$gap);
            $barH = max(3, ($h - 2*$pad) * ($v / $maxSeccion));
            $y = $h - $pad - $barH;
          @endphp
          <rect x="{{ $x }}" y="{{ $y }}" width="{{ $bw }}" height="{{ $barH }}" fill="#2563eb" rx="5" />
          <text x="{{ $x + $bw/2 }}" y="{{ $h - 6 }}" font-size="9" text-anchor="middle" fill="#374151">
            {{ str($labels[$k])->substr(0,8) }}
          </text>
          <text x="{{ $x + $bw/2 }}" y="{{ $y - 4 }}" font-size="10" text-anchor="middle" fill="#111">{{ $v }}</text>
          @php $i++; @endphp
        @endforeach
        <line x1="{{ $pad }}" y1="{{ $h-$pad }}" x2="{{ $w-$pad }}" y2="{{ $h-$pad }}" stroke="#e5e7eb"/>
      </svg>
      <div class="small muted">* Escala normalizada (máx. 9) para comparar secciones.</div>
    </div>

    {{-- Tabla de respuestas --}}
    <div class="card mb16">
      <h3 class="mb8">Respuestas del cuestionario</h3>
      <table class="table small">
        <thead>
          <tr>
            <th>Pregunta</th><th>Valor</th><th>Pregunta</th><th>Valor</th>
          </tr>
        </thead>
        <tbody>
          @for ($i=1; $i<=20; $i+=2)
            <tr>
              <td>Pregunta {{ $i }}</td><td>{{ $respuestas['pregunta'.$i] ?? '-' }}</td>
              <td>Pregunta {{ $i+1 }}</td><td>{{ $respuestas['pregunta'.($i+1)] ?? '-' }}</td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>

    {{-- Top 3 y plan sugerido --}}
    <div class="card mb24">
      <h3 class="mb8">Prioridades (TOP 3)</h3>
      <div class="row">
        @foreach ($top3 as $t)
          <div class="col">
            <div style="font-weight:700;">{{ $t['titulo'] }}</div>
            <div class="bar-wrap mb8"><div class="bar" style="width: {{ min(100, ($t['score'] / 9) * 100) }}%;"></div></div>
            <div class="small muted">Puntaje sección: {{ $t['score'] }}</div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="card">
      <h3 class="mb8">Acciones recomendadas</h3>
      @foreach ($recomendaciones as $r)
        <div class="mb8">
          <div style="font-weight:700;">{{ $r['titulo'] }}</div>
          @foreach ($r['tips'] as $tip)
            <span class="pill small">{{ $tip }}</span>
          @endforeach
        </div>
      @endforeach
    </div>

    <div class="footer">
      Generado por Water Footprint • {{ $fecha }}
    </div>
  </div>
</body>
</html>
