<x-layout>
    <section>
        <div class="bg-blue">
            <div class="mx-auto max-w-screen-2xl px-8 py-48">
                <div class="relative grid grid-cols-[3fr,1fr,3fr] gap-10">
                    <div class="relative">
                        <div class="absolute top-0 right-1/2 -z-10 w-[60vw] bg-gray-50">

                        </div>
                        <div class="mt-[60vw]">

                        </div>
                    </div>
                    <div>
                        <div class="sticky top-10">
                            {{ $product->thumbnail->img()->attributes([
                                'class' => 'h-auto w-full drop-shadow-[-40px_40px_5px_rgba(0,0,0,0.25)]',
                                'alt' => $product->name,
                            ]) }}
                        </div>
                    </div>
                    <div>
                        <div class="sticky top-20 py-10">
                            <h1 class="text-7xl font-bold uppercase">
                                <span
                                    class="underscore after:bg-[var(--underscore-color)]"
                                    style="--underscore-color: {{ $product->attributes->color }}"
                                >
                                    {{ $product->name }}
                                </span>
                            </h1>
                            <dl>
                                <dt class="sr-only">Typ</dt>
                                <dt class="text-2xl uppercase">{{ $product->attributes->type }}</dt>
                                <dt class="sr-only">Cena</dt>
                                <dd class="text-4xl font-medium uppercase">{{ price_format($product->price) }}</dd>
                            </dl>
                            <livewire:add-to-cart-form :product="$product" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="h-[2000px]">

        </div>
    </section>
</x-layout>
