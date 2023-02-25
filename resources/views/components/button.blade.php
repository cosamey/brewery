@props(['as' => 'button', 'color' => 'rose'])

@php
    $element = match ($as) {
        'link' => 'a',
        'button' => 'button',
    };
@endphp

<{{ $element }}
    {{ $attributes->class([
        'relative inline-flex items-center justify-center rounded-2xl px-10 py-5 text-center text-xl font-bold uppercase shadow-[0_0_5px_rgba(0,0,0,0.25)] active:brightness-90 sm:px-14 sm:text-2xl',
        'shadow-black bg-black text-white shadow-black' => $color === 'black',
        'shadow-blue bg-blue text-black shadow-blue' => $color === 'blue',
        'shadow-rose bg-rose text-black shadow-rose' => $color === 'rose',
        'shadow-white bg-white text-black shadow-white' => $color === 'white',
    ]) }}
>
    {{ $slot }}
</{{ $element }}>
