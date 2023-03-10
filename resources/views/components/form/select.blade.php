@aware(['id', 'required'])
@props(['placeholder' => null, 'options'])

<select
    id="{{ $id }}"
    name="{{ $id }}"
    {{ $attributes->class('block w-full border-0 bg-transparent p-0 focus:outline-none focus:ring-0') }}
    {{ $required ? 'required' : '' }}
>
    @if ($placeholder)
        <option value="" disabled>{{ $placeholder }}</option>
    @endif
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
    @endforeach
</select>
