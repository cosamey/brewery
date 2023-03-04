@props(['product'])

<div class="relative z-10 rounded-3xl bg-[#FFFFFF] p-4 shadow-[0_0_10px_rgba(0,0,0,0.25)]">
    <a href="{{ route('products.show', $product) }}">
        {{ $product->image->img()->attributes([
            'class' => 'mx-auto h-60 w-auto drop-shadow-[-20px_20px_10px_rgba(0,0,0,0.25)]',
            'alt' => $product->name,
        ]) }}
        <div class="mt-5 ml-2">
            <h3 class="text-2xl font-bold uppercase">{{ $product->name }}</h3>
            <dl>
                <dt class="sr-only">Typ</dt>
                <dt class="text-base uppercase">{{ $product->attributes->type }}</dt>
                <dt class="sr-only">Cena</dt>
                <dd class="text-xl font-medium uppercase">{{ price_format($product->price) }}</dd>
            </dl>
        </div>
    </a>
    <div class="absolute right-4 bottom-4 z-20">
        <livewire:add-to-cart-form
            :product="$product"
            only-icon
        />
    </div>
</div>
