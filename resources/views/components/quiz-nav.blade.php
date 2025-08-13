@props([
  'prev' => null,      // nombre de ruta GET para regresar (puede ser 'intro' en la 1ª sección)
  'prevText' => '← Anterior',
  'nextText' => 'Guardar y continuar →',
  'isLast' => false,   // true en la última sección
])

<div class="flex items-center justify-between gap-3 mt-6">
  {{-- Volver --}}
  @if($prev)
    <a href="{{ route($prev) }}"
       class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
      {{ $prevText }}
    </a>
  @else
    <span></span>
  @endif

  {{-- Continuar (submit del form) --}}
  <button type="submit"
          class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
    {{ $isLast ? 'Ver resultado →' : $nextText }}
  </button>
</div>
