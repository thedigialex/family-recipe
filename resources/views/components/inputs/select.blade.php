@props(['disabled' => false, 'options' => [], 'selected' => null])

<select 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge([
        'class' => 'bg-backgroundAccent w-full rounded-md shadow-sm focus:ring-2 focus:ring-accent focus:border-accent'
    ]) !!}
>
    @foreach($options as $option)
        <option value="{{ $option['value'] }}" {{ $selected == $option['value'] ? 'selected' : '' }}>
            {{ $option['text'] }}
        </option>
    @endforeach
</select>
