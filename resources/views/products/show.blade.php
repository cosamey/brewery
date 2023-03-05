<x-layout>
    <section>
        <div style="background-color: {{ $product->attributes['color'] }}">
            <div class="mx-auto max-w-screen-2xl px-8 py-48">
                <div class="relative grid grid-cols-[2.5fr,1fr,2.5fr] gap-10">
                    <div class="relative">
                        <div class="absolute top-0 -left-60 w-[50vw] min-w-[24rem]">
                            {{ $product->getFirstMedia('art')
                                ?->img()->attributes([
                                    'class' => 'h-full w-full',
                                    'alt' => 'Ilustrácia',
                                ]) }}
                        </div>
                        <div class="mt-[60vw]">
                            <p class="text-4xl font-bold uppercase">{{ $product->excerpt }}</p>
                            <dl class="mt-10 grid grid-cols-1 gap-5 lg:grid-cols-3">
                                <div class="text-center">
                                    <dd class="text-5xl font-bold">{{ $product->attributes['alcohol'] }}</dd>
                                    <dt class="text-xl">alkohol %</dt>
                                </div>
                                <div class="text-center">
                                    <dd class="text-5xl font-bold">{{ $product->attributes['ibu'] }}</dd>
                                    <dt class="text-xl">IBU</dt>
                                </div>
                                <div class="text-center">
                                    <dd class="text-5xl font-bold">{{ $product->attributes['type'] }}</dd>
                                    <dt class="text-xl">typ</dt>
                                </div>
                            </dl>
                            <div class="mt-20 flex flex-col gap-10">
                                <div>
                                    <h2 class="text-4xl font-bold uppercase">Popis</h2>
                                    <p class="text-2xl">
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div>
                                    <h2 class="text-4xl font-bold uppercase">Technické údaje</h2>
                                    <dl class="text-2xl">
                                        @isset ($product->attributes['hops'])
                                            <div class="flex items-center gap-2">
                                                <dt class="font-medium">Chmeľ</dt>
                                                <dd>{{ $product->attributes['hops'] }}</dd>
                                            </div>
                                        @endisset
                                        @isset ($product->attributes['ibu'])
                                            <div class="flex items-center gap-2">
                                                <dt class="font-medium">IBU</dt>
                                                <dd>{{ $product->attributes['ibu'] }}</dd>
                                            </div>
                                        @endisset
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="sticky top-10">
                            {{ $product->image?->img()->attributes([
                                'class' => 'h-auto w-full drop-shadow-[-40px_40px_5px_rgba(0,0,0,0.25)]',
                                'alt' => $product->name,
                            ]) }}
                        </div>
                    </div>
                    <div>
                        <div class="sticky top-20 mt-20 py-10">
                            <h1 class="text-7xl font-bold uppercase">
                                {{ $product->name }}
                            </h1>
                            <dl class="mt-5">
                                @isset($product->attributes['type'])
                                    <div>
                                        <dt class="sr-only">Typ</dt>
                                        <dt class="text-2xl uppercase">{{ $product->attributes['type'] }}</dt>
                                    </div>
                                @endisset
                                <div class="mt-5">
                                    <dt class="sr-only">Cena</dt>
                                    <dd class="text-4xl font-medium uppercase">
                                        {{ price_format($product->price) }}
                                        <span class="text-sm uppercase">s DPH</span>
                                    </dd>
                                </div>
                            </dl>
                            <div class="mt-10">
                                <livewire:add-to-cart-form :product="$product" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
