@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="90" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 9. Consumo de bienes y productos de papel
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit9') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">17. ¿Con qué frecuencia compras productos de papel (servilletas, toallas de papel, etc.)?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta17" value="1" required> Menos de 1 vez al mes</label>
          <label><input type="radio" name="pregunta17" value="2" required> 1 vez al mes</label>
          <label><input type="radio" name="pregunta17" value="3" required> Más de 2 veces al mes</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">18. ¿Reciclas papel y otros materiales en tu hogar?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta18" value="1" required> Siempre</label>
          <label><input type="radio" name="pregunta18" value="2" required> A veces</label>
          <label><input type="radio" name="pregunta18" value="3" required> Nunca</label>
        </div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('jardineria') }}"
           class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
          ← Anterior
        </a>
        <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
          Siguiente
        </button>
      </div>
    </form>
  </div>
@endsection
