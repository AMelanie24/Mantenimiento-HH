@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="60" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 6. Uso de agua en el hogar
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit6') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">11. ¿Cuánto tiempo te tomas en la ducha?</label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta11" value="1" required class="mr-2"> Menos de 5 minutos</label>
          <label class="block"><input type="radio" name="pregunta11" value="2" required class="mr-2"> 5-10 minutos</label>
          <label class="block"><input type="radio" name="pregunta11" value="3" required class="mr-2"> Más de 10 minutos</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">
          12. ¿Tienes sistemas de ahorro de agua instalados (regaderas ahorradoras, inodoros de bajo flujo)?
        </label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta12" value="1" required class="mr-2"> Sí</label>
          <label class="block"><input type="radio" name="pregunta12" value="2" required class="mr-2"> Parcialmente</label>
          <label class="block"><input type="radio" name="pregunta12" value="3" required class="mr-2"> No</label>
        </div>
      </div>

      {{-- Footer: volver y siguiente --}}
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
