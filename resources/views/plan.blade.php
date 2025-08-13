@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="100" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Plan de ahorro de agua
  </h1>

  <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto space-y-8">

    <p class="text-slate-600 text-center">
      Priorizamos las áreas con mayor impacto en tu resultado. Empieza por estas acciones para ver el mayor cambio.
    </p>

    {{-- TOP 3 ÁREAS CON MÁS IMPACTO --}}
    <div class="grid md:grid-cols-3 gap-6">
      @foreach ($recomendaciones as $rec)
        <div class="rounded-2xl border border-slate-200 p-5 flex flex-col">
          <div class="flex items-center justify-between mb-2">
            <h2 class="text-lg font-bold">{{ $rec['titulo'] }}</h2>
            <span class="text-xs px-2 py-1 rounded-full bg-teal-50 text-teal-700">
              {{ $rec['pct'] }}%
            </span>
          </div>

          <ul class="space-y-2 text-sm flex-1">
            @foreach ($rec['tips'] as $t)
              <li class="flex items-start gap-2">
                <span class="mt-1 inline-block w-2.5 h-2.5 rounded-full bg-teal-600"></span>
                <p class="font-medium text-slate-800">{{ $t['txt'] }}</p>
              </li>
            @endforeach
          </ul>

          <details class="mt-4 group">
            <summary class="cursor-pointer select-none text-sm text-slate-600 hover:text-slate-800">
              Cómo empezar hoy <span class="group-open:hidden">▾</span><span class="hidden group-open:inline">▴</span>
            </summary>
            <div class="mt-2 text-sm text-slate-600 space-y-2">
              <p>1) Define una meta simple para esta semana.</p>
              <p>2) Usa recordatorios prácticos (temporizador / nota visible).</p>
              <p>3) Registra el cambio y celebra tu progreso. 🎉</p>
            </div>
          </details>
        </div>
      @endforeach
    </div>

    {{-- INSPIRACIÓN (imagen con lightbox + video) --}}
    <div class="grid md:grid-cols-2 gap-6 items-start">
      {{-- Imagen: click para ampliar en modal --}}
      <figure
        class="aspect-video rounded-xl overflow-hidden border border-slate-200 bg-slate-50 cursor-zoom-in"
        onclick="openLightbox('{{ asset('img/mapas/huella.jpeg') }}')"
        title="Toca para ampliar">
        <img
          src="{{ asset('img/mapas/huella.jpeg') }}"
          alt="Huella hídrica - Datos curiosos"
          class="w-full h-full object-contain p-2"
        >
      </figure>

      {{-- Video YouTube embebido --}}
      <div class="aspect-video rounded-xl overflow-hidden border border-slate-200">
        <iframe
          class="w-full h-full"
          src="https://www.youtube.com/embed/JY_vs3vJ08w"
          title="Consejos para ahorrar agua"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen>
        </iframe>
      </div>
    </div>

    {{-- Modal / Lightbox --}}
    <div id="lightbox"
         class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4"
         aria-modal="true" role="dialog" aria-label="Imagen ampliada">
      <button type="button"
              class="absolute top-4 right-5 text-white/90 text-3xl leading-none"
              aria-label="Cerrar"
              onclick="closeLightbox()">&times;</button>

      <img id="lightbox-img"
           src=""
           alt="Imagen ampliada"
           class="max-w-[95vw] max-h-[85vh] object-contain rounded-xl shadow-2xl opacity-0 scale-95 transition duration-200" />
    </div>

    {{-- COPIAR PLAN --}}
    @php
      $texto = "Mi plan de ahorro de agua:\n";
      foreach ($recomendaciones as $rec) {
        $texto .= "- ".$rec['titulo']." (impacto: ".$rec['pct']."%)\n";
        foreach ($rec['tips'] as $t) {
          $texto .= "  • ".$t['txt']."\n";
        }
      }
    @endphp
    <div class="flex justify-center">
      <button
        id="copyPlan"
        data-text="{{ trim($texto) }}"
        class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
        Copiar mi plan
      </button>
    </div>

    {{-- CTA INFERIOR --}}
    <div class="flex flex-wrap gap-3 justify-center">
      <a href="{{ route('cuestionario.puntaje') }}"
         class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
        Volver al resumen
      </a>
      <a href="{{ route('inicio') }}"
         class="px-4 py-2 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
        Ir al inicio
      </a>
    </div>

  </div>

  {{-- JS: copiar plan + lightbox --}}
  <script>
    // Copiar plan
    document.addEventListener('DOMContentLoaded', function () {
      const btn = document.getElementById('copyPlan');
      if (btn) {
        btn.addEventListener('click', async () => {
          try {
            const txt = btn.getAttribute('data-text');
            await navigator.clipboard.writeText(txt);
            btn.textContent = '¡Plan copiado!';
            setTimeout(() => btn.textContent = 'Copiar mi plan', 1500);
          } catch (e) {
            alert('No se pudo copiar. Intenta manualmente.');
          }
        });
      }
    });

    // Lightbox simple con animación y cierre por fondo/Esc
    function openLightbox(src) {
      const lb = document.getElementById('lightbox');
      const img = document.getElementById('lightbox-img');
      img.src = src;
      lb.classList.remove('hidden');
      // Espera un frame para animar
      requestAnimationFrame(() => {
        img.classList.remove('opacity-0', 'scale-95');
        img.classList.add('opacity-100', 'scale-100');
      });

      // Cerrar al hacer click en el fondo negro
      lb.addEventListener('click', (e) => {
        if (e.target === lb) closeLightbox();
      });

      // Cerrar con tecla Esc
      document.addEventListener('keydown', escHandler);
    }

    function closeLightbox() {
      const lb = document.getElementById('lightbox');
      const img = document.getElementById('lightbox-img');
      // Animación de salida
      img.classList.remove('opacity-100', 'scale-100');
      img.classList.add('opacity-0', 'scale-95');
      setTimeout(() => {
        lb.classList.add('hidden');
        img.src = '';
      }, 180);
      document.removeEventListener('keydown', escHandler);
    }

    function escHandler(e) {
      if (e.key === 'Escape') closeLightbox();
    }
  </script>
@endsection
