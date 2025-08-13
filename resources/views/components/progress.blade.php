@props(['percent' => 0])

<div class="max-w-6xl mx-auto px-4 mt-2 mb-4">
  <div class="flex justify-between text-sm text-slate-600 mb-1">
    <span>Progreso</span><span>{{ $percent }}%</span>
  </div>
  <div class="w-full h-2 bg-slate-200 rounded-full overflow-hidden">
    <div class="h-2 bg-blue-600" style="width: {{ $percent }}%"></div>
  </div>
</div>
