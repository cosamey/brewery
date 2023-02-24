@aware(['id', 'required'])
@props(['type' => 'text'])

<input
    id="{{ $id }}"
    name="{{ $id }}"
    type="{{ $type }}"
    {!! $attributes->class('block w-full bg-transparent border-0 font-medium p-0 focus:outline-none focus:ring-0') !!}
    {{ $required ? 'required' : '' }}
/>
