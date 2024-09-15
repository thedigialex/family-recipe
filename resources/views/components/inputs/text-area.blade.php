@props(['disabled' => false, 'value' => ''])

<textarea 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge([
        'class' => 'bg-backgroundAccent w-full rounded-md shadow-sm focus:ring-2 focus:ring-accent focus:border-accent'
    ]) !!}
>{{ old($attributes->get('name'), $value) }}</textarea>
