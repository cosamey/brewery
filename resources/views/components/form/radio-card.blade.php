@props(['value'])

<div
    x-radio:option
    value="{{ $value }}"
    class="flex cursor-pointer rounded-2xl border-2 p-4"
    :class="{ 'ring-4 ring-indigo-600 border-transparent': $radioOption.isChecked, 'border-neutral-500': !$radioOption.isChecked }"
>
    <div class="flex flex-1 select-none flex-col">
        {{ $slot }}
    </div>
    {{ $icon }}
</div>
