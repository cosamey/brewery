@props(['value'])

<div
    x-radio:option
    value="{{ $value }}"
    class="flex items-center cursor-pointer rounded-2xl border-2 p-4"
    :class="{
        'border-transparent ring-4 ring-indigo-600': $radioOption.isChecked,
        'border-gray-500': !$radioOption.isChecked,
    }"
>
    <div class="flex flex-1 select-none flex-col">
        {{ $slot }}
    </div>
    {{ $icon }}
</div>
