@extends('layouts.preguntas')

@section('progress')
  <x-progress :percent="30" />
@endsection

@section('content')
  <h1 class="text-3xl md:text-4xl font-extrabold text-center text-slate-800 mb-6">
    Sección 3. Consumo de productos y bienes
  </h1>

  <div class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-6 md:p-8 text-slate-800 mx-auto">
    <form action="{{ route('cuestionario.submit3') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-semibold mb-2">5. ¿Con qué frecuencia compras ropa nueva?</label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta5" value="1" required class="mr-2"> Menos de 1 vez al año</label>
          <label class="block"><input type="radio" name="pregunta5" value="2" required class="mr-2"> 1-2 veces al año</label>
          <label class="block"><input type="radio" name="pregunta5" value="3" required class="mr-2"> Más de 3 veces al año</label>
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-2">6. ¿Con qué frecuencia compras productos electrónicos (teléfonos, computadoras, etc.)?</label>
        <div class="space-y-2">
          <label class="block"><input type="radio" name="pregunta6" value="1" required class="mr-2"> Rara vez o nunca</label>
          <label class="block"><input type="radio" name="pregunta6" value="2" required class="mr-2"> 1 cada 2-3 años</label>
          <label class="block"><input type="radio" name="pregunta6" value="3" required class="mr-2"> Más de 1 vez al año</label>
        </div>
      </div>

      {{-- Footer: volver y siguiente --}}
      <div class="mt-4 flex items-center justify-between">
        <a href="{{ route('alimentos') }}"
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
