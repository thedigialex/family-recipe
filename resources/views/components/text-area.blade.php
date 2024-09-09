@props(['disabled' => false, 'value' => ''])

<textarea 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(['class' => 'bg-backgroundAccent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}
>{{ old($attributes->get('name'), $value) }}</textarea>
