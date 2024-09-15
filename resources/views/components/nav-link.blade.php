@props(['active'])

@php
$baseClasses = 'inline-flex h-3/4 self-end min-w-[100px] flex justify-center items-center text-center px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-t-lg overflow-hidden';

$activeClasses = ($active ?? false)
    ? 'bg-background text-accent'
    : 'hover:border-accent ';
@endphp

<a {{ $attributes->merge(['class' => "$baseClasses $activeClasses"]) }}>
    <x-fonts.paragraph>{{ $slot }}</x-fonts.paragraph>
</a>
