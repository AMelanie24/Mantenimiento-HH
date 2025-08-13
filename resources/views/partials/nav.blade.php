<nav class="w-full bg-white/80 backdrop-blur border-b border-slate-200 fixed top-0 left-0 z-50">
  <div class="max-w-6xl mx-auto px-4 h-14 flex items-center justify-between">
    <a href="{{ route('inicio') }}" class="font-extrabold text-blue-700">Huella Hídrica</a>

    <div class="flex items-center gap-4">
      <a href="{{ route('mapa') }}" class="text-slate-700 hover:text-blue-700">Mapa</a>
      <a href="{{ route('cuestionario.puntuaciones') }}" class="text-slate-700 hover:text-blue-700">Marcador</a>

      @guest
        <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-full bg-blue-600 text-white hover:bg-blue-700">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-full border border-blue-600 text-blue-700 hover:bg-blue-50">Registrarse</a>
      @endguest

      @auth
        <div class="flex items-center gap-3">
          <a href="{{ route('profile.edit') }}" class="text-slate-700 hover:text-blue-700">{{ auth()->user()->name ?? 'Perfil' }}</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-3 py-1.5 rounded-full bg-red-600 text-white hover:bg-red-700">Cerrar sesión</button>
          </form>
        </div>
      @endauth
    </div>
  </div>
</nav>
<div class="h-14"></div> {{-- separador por el nav fijo --}}
