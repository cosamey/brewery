<div
    x-data="{ quantity: 1 }"
    class="flex items-center gap-5"
>
    @if ($onlyIcon)
        <x-icon-button
            class="transition-transform duration-300 hover:scale-110 active:brightness-90"
            aria-label="Pridať do košíka"
            @click="$wire.add(quantity)"
        >
            <x-icon.plus
                class="h-5 w-5 stroke-[4]"
                aria-hidden="true"
            />
        </x-icon-button>
    @else
        <div class="flex items-center gap-2">
            <button
                aria-label="Zväčšiť množstvo o 1"
                class="rounded-[100%] border-[3px] border-black p-2 hover:bg-black hover:text-white"
                @click="quantity++"
            >
                <x-icon.plus
                    class="h-4 w-4 stroke-[4]"
                    aria-hidden="true"
                />
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
                <x-icon.minus
                    class="h-4 w-4 stroke-[4]"
                    aria-hidden="true"
                />
            </button>
        </div>
        <x-button
            color="black"
            @click="$wire.add(quantity)"
        >
            Pridať do košíka
        </x-button>
    @endif
</div>
