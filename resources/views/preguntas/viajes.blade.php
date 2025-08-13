@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="100" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 10. Viajes y transporte a larga distancia
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit10') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">19. ¿Con qué frecuencia viajas en avión?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta19" value="1" required> Menos de una vez por año</label>
          <label><input type="radio" name="pregunta19" value="2" required> 1-2 veces al año</label>
          <label><input type="radio" name="pregunta19" value="3" required> Más de 3 veces al año</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">20. ¿Qué tipo de transporte utilizas para distancias largas (más de 100 km)?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta20" value="1" required> Transporte público</label>
          <label><input type="radio" name="pregunta20" value="2" required> Auto compartido</label>
          <label><input type="radio" name="pregunta20" value="3" required> Auto propio</label>
        </div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('papel') }}"
           class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
          ← Anterior
        </a>
        <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-teal-600 text-white font-semibold hover:bg-teal-700">
          Enviar Respuestas
        </button>
      </div>
    </form>
  </div>
@endsection
