@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="40" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 4. Transporte
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit4') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">
          7. ¿Qué medio de transporte utilizas con mayor frecuencia?
        </label>
        <div class="space-y-2">
          <label class="block">
            <input type="radio" name="pregunta7" value="1" required class="mr-2">
            Transporte público o bicicleta
          </label>
          <label class="block">
            <input type="radio" name="pregunta7" value="2" required class="mr-2">
            Automóvil compartido
          </label>
          <label class="block">
            <input type="radio" name="pregunta7" value="3" required class="mr-2">
            Automóvil propio o moto
          </label>
        </div>
      </div>

      {{-- Footer: volver y siguiente (un solo submit) --}}
      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('productosybienes') }}"
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
