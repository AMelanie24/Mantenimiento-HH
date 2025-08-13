@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="80" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 8. Jardinería y cuidado de áreas verdes
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit8') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">15. ¿Cómo mantienes tu jardín o áreas verdes?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta15" value="1" required> No tengo jardín o uso plantas autóctonas y riego mínimo</label>
          <label><input type="radio" name="pregunta15" value="2" required> Uso sistema de riego eficiente</label>
          <label><input type="radio" name="pregunta15" value="3" required> Uso manguera o riego manual frecuente</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">16. ¿Con qué frecuencia riegas el césped o jardín?</label>
        <div class="space-y-2">
          <label><input type="radio" name="pregunta16" value="1" required> Nunca o cuando llueve</label>
          <label><input type="radio" name="pregunta16" value="2" required> 1-2 veces por semana</label>
          <label><input type="radio" name="pregunta16" value="3" required> Diariamente</label>
        </div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('energia') }}"
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
