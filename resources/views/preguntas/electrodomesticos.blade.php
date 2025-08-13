@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="50" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 5. Uso de electrodomésticos y hábitos de limpieza
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit5') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">8. ¿Con qué frecuencia utilizas la lavadora?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta8" value="1" required> Menos de 1 vez por semana</label>
          <label><input type="radio" name="pregunta8" value="2" required> 1-2 veces por semana</label>
          <label><input type="radio" name="pregunta8" value="3" required> Más de 3 veces por semana</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">9. ¿Con qué frecuencia usas el lavavajillas?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta9" value="1" required> No uso lavavajillas</label>
          <label><input type="radio" name="pregunta9" value="2" required> 1-2 veces por semana</label>
          <label><input type="radio" name="pregunta9" value="3" required> Más de 3 veces a la semana</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">10. ¿Cómo lavas tu auto?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta10" value="1" required> No lavo el auto o lo llevo a una estación con reciclaje de agua</label>
          <label><input type="radio" name="pregunta10" value="2" required> Lo lavo a mano usando baldes</label>
          <label><input type="radio" name="pregunta10" value="3" required> Lo lavo con manguera</label>
        </div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('transporte') }}"
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
