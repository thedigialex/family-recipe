@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-text']) }}>
    {{ $value ?? $slot }}
</label>
