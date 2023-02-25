@props(['as' => 'button', 'color' => 'rose'])

@php
    $element = match ($as) {
        'link' => 'a',
        'button' => 'button',
    };
@endphp

<{{ $element }}
    {{ $attributes->class([
        'relative inline-flex items-center justify-center rounded-full p-4 shadow-[0_0_5px_rgba(0,0,0,0.25)] active:brightness-90',
        'bg-black text-black shadow-black' => $color === 'black',
        'bg-blue text-black shadow-blue' => $color === 'blue',
        'bg-rose text-black shadow-rose' => $color === 'rose',
        'bg-white text-black shadow-white' => $color === 'white',
    ]) }}
>
    {{ $slot }}
</{{ $element }}>
