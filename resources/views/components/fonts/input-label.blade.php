@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-lg text-text']) }}>
    {{ $value ?? $slot }}
</label>
