@props(['as' => 'button', 'color' => 'rose'])

@php
    $element = match ($as) {
        'link' => 'a',
        'button' => 'button',
    };
@endphp

<{{ $element }}
    {{ $attributes->class([
        'relative inline-flex items-center justify-center rounded-full p-4',
        'bg-blue text-black' => $color === 'blue',
        'bg-rose text-black' => $color === 'rose',
    ]) }}
>
    {{ $slot }}
</{{ $element }}>
