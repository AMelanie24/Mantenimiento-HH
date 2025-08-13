@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="20" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 2. Consumo de alimentos
  </h1>

  <form action="{{ route('cuestionario.submit2') }}" method="POST"
        class="bg-white shadow-xl rounded-2xl p-6 md:p-8 space-y-6 text-slate-800">
    @csrf

    <div>
      <label class="block font-semibold">3. ¿Cuánto consumo de carne tienes semanalmente?</label>
      <div class="mt-2 space-y-2">
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta3" value="1" required> Ninguna
        </label><br>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta3" value="2" required> 1-2 veces por semana
        </label><br>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta3" value="3" required> Más de 3 veces a la semana
        </label>
      </div>
    </div>

    <div>
      <label class="block font-semibold">4. ¿Qué proporción de tus alimentos son productos procesados?</label>
      <div class="mt-2 space-y-2">
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta4" value="1" required> Pocos o ninguno
        </label><br>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta4" value="2" required> Algunos alimentos procesados
        </label><br>
        <label class="inline-flex items-center gap-2">
          <input type="radio" name="pregunta4" value="3" required> Muchos alimentos procesados
        </label>
      </div>
    </div>

    {{-- Footer: volver + siguiente (un solo submit) --}}
    <div class="mt-2 flex items-center justify-between">
      <a href="{{ route('usodirecto') }}"
         class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
        ← Anterior
      </a>

      <button type="submit"
              class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
        Siguiente
      </button>
    </div>
  </form>
@endsection
