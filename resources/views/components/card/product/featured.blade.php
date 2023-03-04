@props(['product'])

<a
    href="{{ route('products.show', $product) }}"
    class="group relative w-60 overflow-hidden rounded-3xl px-10 py-10"
    style="background-color: {{ $product->attributes->color }}"
    aria-label="Zobraziť produkt {{ $product->name }}"
>
    <div class="mt-10">
        {{ $product->image->img()->attributes([
            'class' => 'mx-auto w-auto origin-bottom-left translate-x-10 object-contain drop-shadow-[-20px_20px_10px_rgba(0,0,0,0.25)] transition group-hover:-rotate-3',
            'alt' => $product->name,
        ]) }}
    </div>
    <div class="absolute top-8 left-8 max-w-[calc(100%-4rem)]">
        <h3 class="text-2xl font-bold uppercase">
            {{ $product->name }}
        </h3>
        <dl class="flex flex-col gap-1 text-lg">
            <div class="flex gap-0.5">
                <dd>{{ $product->attributes->alcohol }}%</dd>
                <dt class="font-light">alk.</dt>
            </div>
            <div class="flex gap-0.5">
                <dd>{{ $product->attributes->ibu }}</dd>
                <dt class="font-light">IBU</dt>
            </div>
            <div class="flex gap-0.5">
                <dd>{{ $product->attributes->volume }}</dd>
                <dt class="font-light">ml</dt>
            </div>
        </dl>
    </div>
</a>
