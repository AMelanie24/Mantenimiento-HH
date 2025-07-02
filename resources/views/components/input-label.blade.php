@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-cyan-500']) }}>
    {{ $value ?? $slot }}
</label>
