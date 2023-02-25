@props(['as' => 'button', 'color' => 'rose'])

@php
    $element = match ($as) {
        'link' => 'a',
        'button' => 'button',
    };
@endphp

<{{ $element }}
    {{ $attributes->class([
        'relative inline-flex items-center justify-center rounded-2xl px-10 py-5 text-center text-xl font-bold uppercase shadow-[0_0_10px_rgba(0,0,0,0.25)] active:brightness-90 sm:px-14 sm:text-2xl',
        'bg-blue text-black' => $color === 'blue',
        'bg-rose text-black' => $color === 'rose',
        'bg-white text-black' => $color === 'white',
        'bg-black text-white' => $color === 'black',
    ]) }}
>
    {{ $slot }}
</{{ $element }}>
