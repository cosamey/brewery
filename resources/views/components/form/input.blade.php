@aware(['id', 'required'])
@props(['type' => 'text'])

<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="{{ $type }}"
    {!! $attributes->class('block w-full border-0 bg-transparent p-0 font-medium focus:outline-none focus:ring-0') !!}
    {{ $required ? 'required' : '' }}
/>
