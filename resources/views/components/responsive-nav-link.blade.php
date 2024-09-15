@props(['active'])

@php
$baseClasses = 'block w-full text-lg py-4 flex justify-center items-center text-center px-1 text-sm font-medium leading-5 transition duration-150 ease-in-out border-b';

$activeClasses = ($active ?? false)
? 'bg-background text-accent border-b-accent'
: 'hover:border-b-accent border-b-gray-200';

$classes = $baseClasses . ' ' . $activeClasses;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <x-fonts.paragraph>{{ $slot }}</x-fonts.paragraph>
</a>