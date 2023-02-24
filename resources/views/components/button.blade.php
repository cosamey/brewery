@props(['as' => 'button', 'color' => 'rose'])

@php
    $element = match ($as) {
        'link' => 'a',
        'button' => 'button',
    };
@endphp

<{{ $element }}
    {{ $attributes->class([
        'relative inline-flex items-center justify-center rounded-2xl px-10 py-5 text-center text-xl font-bold uppercase sm:px-14 sm:text-2xl',
        'bg-blue text-black' => $color === 'blue',
        'bg-rose text-black' => $color === 'rose',
    ]) }}
>
    {{ $slot }}
</{{ $element }}>
