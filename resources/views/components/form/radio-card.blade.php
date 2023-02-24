@props(['value', 'mark' => false])

<div
    x-radio:option
    value="{{ $value }}"
    class="flex cursor-pointer rounded-2xl border-2 p-4"
    :class="{ 'ring-4 ring-indigo-600 border-transparent': $radioOption.isChecked, 'border-neutral-500': !$radioOption.isChecked }"
>
    <div class="flex flex-1 select-none flex-col">
        {{ $slot }}
    </div>
    @if ($mark)
        <svg
            class="h-5 w-5 text-indigo-600"
            :class="{ 'invisible': !$radioOption.isChecked }"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true"
        >
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
            />
        </svg>
    @endif
</div>
