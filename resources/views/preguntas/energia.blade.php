@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="70" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 7. Uso de energía y calefacción
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit7') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">13. ¿Qué tipo de energía utilizas principalmente en tu hogar?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta13" value="1" required> Energía renovable</label>
          <label><input type="radio" name="pregunta13" value="2" required> Gas natural</label>
          <label><input type="radio" name="pregunta13" value="3" required> Carbón o energía fósil</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">14. ¿Tienes calefacción o aire acondicionado central?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta14" value="1" required> No uso calefacción o aire acondicionado</label>
          <label><input type="radio" name="pregunta14" value="2" required> Uso calefacción o aire acondicionado de manera eficiente</label>
          <label><input type="radio" name="pregunta14" value="3" required> Uso calefacción o aire acondicionado de manera intensiva</label>
        </div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('electrodomesticos') }}"
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
