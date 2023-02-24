@props(['id', 'label', 'error' => null, 'required' => false])

<div {!! $attributes->class(['rounded-2xl border-2 px-4 py-2', 'border-gray-700' => ! $error, 'border-red-500 text-red-500' => $error]) !!}>
    <label for="{{ $id }}">
        {{ $label }}
        @unless($required)
            <span class="text-xs opacity-75">(voliteľné)</span>
        @endunless
    </label>
    {{ $slot }}
</div>
