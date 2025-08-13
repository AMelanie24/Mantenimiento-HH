<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Huella Hídrica — Introducción</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    /* Gota animada */
    .drop-shape{
      width: clamp(180px, 30vw, 260px);
      aspect-ratio: 3 / 4;
      border-radius: 60% 60% 60% 60% / 75% 75% 45% 45%;
      background: #cfe9ff;
      position: relative;
      overflow: hidden;
      box-shadow: inset 0 0 40px rgba(116,179,255,.33);
    }
    .wave{
      position: absolute; left: -20%; right: -20%; bottom: -2%;
      height: 55%;
      background: #4aa3ff;
      opacity: .9;
      border-top-left-radius: 999px; border-top-right-radius: 999px;
      animation: slosh 4.5s ease-in-out infinite;
    }
    .wave::after{
      content:"";
      position:absolute; inset:0;
      background: radial-gradient(40% 60% at 50% -10%, rgba(255,255,255,.7) 40%, transparent 45%);
      mix-blend-mode: screen;
    }
    @keyframes slosh{
      0%{ transform: translateX(0) rotate(0deg); }
      50%{ transform: translateX(8%) rotate(2deg); }
      100%{ transform: translateX(0) rotate(0deg); }
    }
    @media (prefers-reduced-motion: reduce){
      .wave{ animation: none; }
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-blue-400 via-cyan-400 to-teal-300 text-slate-900 relative">

  {{-- Ondas verdes del fondo (mismo estilo que tu landing) --}}
  <div class="pointer-events-none absolute inset-x-0 bottom-0 h-64 md:h-80">
    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#6EE7B7" d="M0,192L48,192C96,192,192,192,288,181.3C384,171,480,149,576,149.3C672,149,768,171,864,181.3C960,192,1056,192,1152,197.3C1248,203,1344,213,1392,218.7L1440,224L1440,320L0,320Z"/>
    </svg>
    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#34D399" fill-opacity="0.85" d="M0,288L48,266.7C96,245,192,203,288,192C384,181,480,203,576,218.7C672,235,768,245,864,250.7C960,256,1056,256,1152,245.3C1248,235,1344,213,1392,202.7L1440,192L1440,320L0,320Z"/>
    </svg>
    <svg class="absolute bottom-0 w-full h-full" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <path fill="#10B981" fill-opacity="0.7" d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,197.3C672,213,768,235,864,240C960,245,1056,235,1152,208C1248,181,1344,139,1392,117.3L1440,96L1440,320L0,320Z"/>
    </svg>
  </div>

  <main class="relative z-10 max-w-6xl mx-auto px-4 py-10 md:py-14 space-y-6">

    {{-- (1) Introducción educativa --}}
    <section class="bg-white/90 backdrop-blur shadow-xl rounded-3xl p-6 md:p-10 grid md:grid-cols-2 gap-8">
      <div>
        <span class="inline-block text-sm font-semibold px-3 py-1 rounded-full bg-blue-100 text-blue-700">Antes de empezar</span>
        <h1 class="mt-3 font-extrabold text-3xl md:text-4xl text-slate-800">¿Qué es la huella hídrica?</h1>
        <p class="mt-3 text-slate-600">
          Es la <strong class="text-slate-800">cantidad total de agua dulce</strong> que usamos, directa e indirectamente:
          no solo lo que bebemos, también la usada para producir <em>alimentos, ropa y energía</em>.
        </p>
        <p class="mt-2 text-slate-600">
          Conocerla ayuda a <strong class="text-slate-800">tomar decisiones sostenibles</strong> y a ahorrar.
          Este test te tomará <em>menos de 3 minutos</em>.
        </p>
      </div>

      <div class="flex items-center justify-center">
        <div class="drop-shape">
          <div class="wave"></div>
        </div>
      </div>
    </section>

    {{-- (2) Tarjetas con datos curiosos/impactantes --}}
    <section class="grid md:grid-cols-3 gap-4">
      <article class="bg-white shadow-lg rounded-2xl p-5 flex gap-3">
        <svg viewBox="0 0 24 24" class="w-12 h-12 shrink-0" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M3 21h18M5 21V10m14 11V8M2 10h6l2-3 3 5 2-3h7" />
        </svg>
        <div>
          <h3 class="font-semibold text-slate-800">Uso global</h3>
          <p class="text-slate-600">La <strong>agricultura</strong> emplea cerca del <strong>70 %</strong> del agua dulce mundial.</p>
        </div>
      </article>

      <article class="bg-white shadow-lg rounded-2xl p-5 flex gap-3">
        <svg viewBox="0 0 24 24" class="w-12 h-12 shrink-0" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M8 14s1.5-2 4-2 4 2 4 2"/>
          <path d="M9 9h.01M15 9h.01"/>
        </svg>
        <div>
          <h3 class="font-semibold text-slate-800">Agua en alimentos</h3>
          <p class="text-slate-600">Producir <strong>1 kg de carne</strong> puede requerir hasta <strong>15 000 L</strong> de agua.</p>
        </div>
      </article>

      <article class="bg-white shadow-lg rounded-2xl p-5 flex gap-3">
        <svg viewBox="0 0 24 24" class="w-12 h-12 shrink-0" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M9 7h6M12 7v10" />
          <path d="M3 13h18v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2Z" />
          <path d="M17 17c0 2 1 3 2 3s2-1 2-3"/>
        </svg>
        <div>
          <h3 class="font-semibold text-slate-800">Pequeños hábitos</h3>
          <p class="text-slate-600">Un grifo abierto desperdicia ~<strong>6 L/min</strong>. Ciérralo al cepillarte.</p>
        </div>
      </article>
    </section>

    {{-- (4) Mini infografía / flujo --}}
    <section class="bg-white/90 backdrop-blur shadow-xl rounded-3xl p-6 md:p-8">
      <h2 class="text-xl md:text-2xl font-bold text-slate-800 mb-4">Ciclo de tu consumo hídrico</h2>

      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="relative rounded-xl border border-blue-100 bg-blue-50/50 p-4">
          <strong class="block text-slate-800">Directo</strong>
          <span class="text-slate-600">Beber, bañarte, lavar.</span>
          <span class="hidden lg:block absolute -right-1 top-1/2 w-3 h-3 rotate-45 border-r-2 border-t-2 border-blue-400"></span>
        </div>
        <div class="relative rounded-xl border border-blue-100 bg-blue-50/50 p-4">
          <strong class="block text-slate-800">Alimentos</strong>
          <span class="text-slate-600">Agua para cultivar y procesar.</span>
          <span class="hidden lg:block absolute -right-1 top-1/2 w-3 h-3 rotate-45 border-r-2 border-t-2 border-blue-400"></span>
        </div>
        <div class="relative rounded-xl border border-blue-100 bg-blue-50/50 p-4">
          <strong class="block text-slate-800">Productos</strong>
          <span class="text-slate-600">Ropa, electrónicos, papel.</span>
          <span class="hidden lg:block absolute -right-1 top-1/2 w-3 h-3 rotate-45 border-r-2 border-t-2 border-blue-400"></span>
        </div>
        <div class="rounded-xl border border-blue-100 bg-blue-50/50 p-4">
          <strong class="block text-slate-800">Energía</strong>
          <span class="text-slate-600">Agua para generar electricidad.</span>
        </div>
      </div>

      <div class="mt-6 flex justify-center">
        <a href="{{ route('usodirecto') }}"
           class="inline-flex items-center gap-2 px-6 py-3 rounded-full font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-lg transition">
           Continuar
        </a>
      </div>
    </section>

  </main>
</body>
</html>
