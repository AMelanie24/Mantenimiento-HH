@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="10" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 1: Consumo directo de agua
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit1') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="pregunta1" class="block font-semibold mb-2">
          1. ¿Cuántos litros de agua consumes diariamente para beber?
        </label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta1" value="1" required class="mr-2"> Menos de 2 litros</label>
          <label class="block"><input type="radio" name="pregunta1" value="2" required class="mr-2"> 2-3 litros</label>
          <label class="block"><input type="radio" name="pregunta1" value="3" required class="mr-2"> Más de 3 litros</label>
        </div>
      </div>

      <div>
        <label for="pregunta2" class="block font-semibold mb-2">
          2. ¿Con qué frecuencia te duchas o bañas?
        </label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta2" value="1" required class="mr-2"> Menos de 3 veces a la semana</label>
          <label class="block"><input type="radio" name="pregunta2" value="2" required class="mr-2"> 1 vez cada dos días</label>
          <label class="block"><input type="radio" name="pregunta2" value="3" required class="mr-2"> 1 vez al día</label>
        </div>
      </div>

      {{-- footer: volver + siguiente (un solo submit) --}}
      <div class="mt-2 flex items-center justify-between">
        <a href="{{ route('intro') }}"
           class="px-4 py-2 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50">
          ← Anterior
        </a>
        <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
          Siguiente
        </button>
      </div>

    </form>
  </div>
@endsection
