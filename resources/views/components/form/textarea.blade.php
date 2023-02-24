@aware(['id', 'required'])

<textarea
    id="{{ $id }}"
    name="{{ $id }}"
    {{ $attributes->class('block min-h-[4rem] w-full bg-transparent border-0 font-medium p-0 focus:outline-none focus:ring-0') }}
    {{ $required ? 'required' : '' }}
></textarea>
