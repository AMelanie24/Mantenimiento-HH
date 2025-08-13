<x-guest-layout>

    <div class="w-full max-w-md">
        <div class="bg-white/95 backdrop-blur shadow-2xl rounded-3xl p-6 md:p-8">
            <div class="text-center mb-6">
                <div class="mx-auto w-12 h-12 rounded-full bg-blue-600/10 flex items-center justify-center">
                    <!-- ícono gota -->
                    <svg viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="#2563eb" stroke-width="2">
                        <path d="M12 2s7 7 7 12a7 7 0 1 1-14 0c0-5 7-12 7-12z"/>
                    </svg>
                </div>
                <h1 class="mt-3 text-2xl font-extrabold text-slate-800">Iniciar sesión</h1>
                <p class="text-slate-600 text-sm">Accede para calcular tu huella hídrica</p>
            </div>

            {{-- Mensajes de estado (ej: verificación de email) --}}
            @if (session('status'))
                <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg p-3">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="mb-4 text-sm text-red-700 bg-red-50 border border-red-200 rounded-lg p-3">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Correo electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="mt-1 block w-full rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 px-3 py-2 bg-white">
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-slate-700">Contraseña</label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required
                           class="mt-1 block w-full rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 px-3 py-2 bg-white">
                </div>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-sm text-slate-600">Recordarme</span>
                </label>

                <button type="submit"
                        class="w-full rounded-full bg-blue-600 text-white font-semibold py-2.5 hover:bg-blue-700 shadow-lg">
                    Entrar
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-600">
                ¿No tienes cuenta?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="font-semibold text-blue-700 hover:underline">Regístrate</a>
                @endif
            </p>
        </div>

        
    </div>

</x-guest-layout>
