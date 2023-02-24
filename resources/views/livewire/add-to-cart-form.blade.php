<div
    x-data="{ quantity: 1 }"
    class="flex items-center gap-5"
>
    <div class="flex items-center gap-2">
        <button
            aria-label="Zväčšiť množstvo o 1"
            class="rounded-[100%] border-[3px] border-black p-2 hover:bg-black hover:text-white"
            @click="quantity++"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                stroke="currentColor"
                stroke-width="4"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>
        </button>
        <span
            x-text="quantity"
            class="flex w-8 select-none justify-center text-4xl font-bold"
        ></span>
        <button
            aria-label="Zmenšiť množstvo o 1"
            class="rounded-[100%] border-[3px] border-black p-2 hover:bg-black hover:text-white"
            :class="quantity > 1 || 'cursor-not-allowed opacity-50'"
            @click="if (quantity > 1) quantity--"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                stroke="currentColor"
                stroke-width="4"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M19.5 12h-15"
                />
            </svg>

        </button>
    </div>
    <x-button @click="$wire.add(quantity)">Pridať do košíka</x-button>
</div>
