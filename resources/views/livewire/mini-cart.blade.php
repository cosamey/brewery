<div>
    <div
        x-data="{ open: $wire.entangle('open') }"
        x-popover
        x-model="open"
        class="relative"
    >
        <button
            x-popover:button
            class="relative block"
            aria-label="Otvoriť/zatvoriť mini košík"
        >
            <x-circle class="h-12 w-12 fill-rose transition-colors duration-300" />
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <x-icon.cart
                    class="h-5 w-5 text-black"
                    aria-hidden="true"
                />
            </div>
        </button>
        <div
            x-popover:panel
            class="absolute top-16 right-0 z-20"
            x-cloak
        >
            <div class="md:max-h-none max-h-96 w-60 overflow-y-auto rounded-3xl bg-white px-4 py-4 shadow-[0_0_20px_rgba(0,0,0,.25)] sm:w-80">
                @if ($items->isNotEmpty())
                    <ul>
                        @foreach ($items as $item)
                            <li class="flex justify-between gap-2">
                                <a
                                    href="{{ route('products.show', $item->product) }}"
                                    class="flex items-center gap-2 px-2 py-2"
                                >
                                    {{ $item->product->image->img()->attributes([
                                        'class' => 'h-20 w-10 object-contain',
                                        'alt' => $item->name,
                                    ]) }}
                                    <dl>
                                        <dt class="sr-only">Názov:</dt>
                                        <dd class="text-xl font-medium uppercase">{{ $item->name }}</dd>
                                        <dt class="sr-only">Množstvo a cena</dt>
                                        <dd>{{ $item->quantity }} ks x {{ price_format($item->price) }}</dd>
                                        <dt class="sr-only">Celková cena</dt>
                                        <dd class="text-lg font-medium">{{ price_format($item->total) }}</dd>
                                    </dl>
                                </a>
                                <button
                                    wire:click="remove('{{ $item->id }}')"
                                    class="place-self-start p-3"
                                    aria-label="Vymazať z košíka"
                                >
                                    <x-icon.x
                                        class="h-5 w-5 text-black"
                                        aria-hidden="true"
                                    />
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <x-button
                        as="link"
                        href="{{ route('pages.checkout') }}"
                        class="mt-2 w-full"
                    >
                        Do pokladne
                    </x-button>
                @else
                    <p>Váš košík je prázdny.</p>
                @endif
            </div>
        </div>
    </div>
</div>
