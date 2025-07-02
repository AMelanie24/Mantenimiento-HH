<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center uppercase">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

            <a href="http://127.0.0.1:8000/Preguntas" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <h2 class="mt-6 text-xl font-semibold text-white-900 dark:text-white">Administrar preguntas</h2>
                        <p class="mt-4 text-white-500 dark:text-white-400 text-sm leading-relaxed">
                            Administra las preguntas en el simulador
                        </p>
                    </div>
            </a>

</x-app-layout>
