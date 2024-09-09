@props(['disabled' => false, 'options' => [], 'selected' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-backgroundAccent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) !!}>
    @foreach($options as $option)
    <option value="{{ $option['value'] }}" {{ $selected == $option['value'] ? 'selected' : '' }}>
        {{ $option['text'] }}
    </option>
    @endforeach
</select>