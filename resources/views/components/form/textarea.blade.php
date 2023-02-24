@aware(['id', 'required'])

<textarea
    id="{{ $id }}"
    name="{{ $id }}"
    {{ $attributes->class('block min-h-[4rem] w-full border-0 bg-transparent p-0 font-medium focus:outline-none focus:ring-0') }}
    {{ $required ? 'required' : '' }}
></textarea>
