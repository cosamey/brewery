<x-layout>
    <section>
        <div class="mx-auto max-w-screen-2xl px-8 py-48">
            <div>
                <h1 class="text-7xl font-bold uppercase">
                    <span class="underscore after:!h-7 after:bg-rose">Pokladňa</span>
                </h1>
            </div>
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-20">
                <div class="relative lg:order-2">
                    <div class="sticky top-10">
                        <span class="text-3xl">00</span>
                        <h2 class="text-4xl font-bold uppercase">
                            Košík
                        </h2>
                        <ul class="mt-5 divide-y-2 divide-gray-700">
                            @foreach ($items as $item)
                                <li class="flex items-center gap-2 py-4">
                                    {{ $item->product->thumbnail->img()->attributes([
                                        'class' => 'h-40 w-40 object-contain',
                                        'alt' => $item->name,
                                    ]) }}
                                    <dl>
                                        <dt class="sr-only">Názov:</dt>
                                        <dd class="text-2xl font-medium uppercase">{{ $item->name }}</dd>
                                        <dt class="sr-only">Množstvo a cena</dt>
                                        <dd>{{ $item->quantity }} ks x {{ price_format($item->price) }}</dd>
                                        <dt class="sr-only">Celková cena</dt>
                                        <dd class="text-xl font-medium">{{ price_format($item->total) }}</dd>
                                    </dl>
                                </li>
                            @endforeach
                        </ul>
                        <dl>
                            <div class="flex items-center gap-2">
                                <dt>Suma bez DPH</dt>
                                <dd>{{ price_format($total - $tax) }}</dd>
                            </div>
                            <div class="flex items-center gap-2">
                                <dt>Daň (20%)</dt>
                                <dd>{{ price_format($tax) }}</dd>
                            </div>
                            <div class="flex items-center gap-2 text-2xl font-bold">
                                <dt>Celková suma</dt>
                                <dd>{{ price_format($total) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <div class="lg:order-1">

                </div>
            </div>
        </div>
    </section>
</x-layout>
