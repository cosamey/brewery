<div class="grid grid-cols-1 gap-20 lg:grid-cols-2">
    <div class="relative lg:order-2">
        <div class="sticky top-10">
            <span class="text-3xl">00</span>
            <h2 class="text-4xl font-bold uppercase">
                Košík
            </h2>
            <ul class="mt-5 divide-y-2 divide-gray-700">
                @foreach ($cart->items as $item)
                    <li class="flex items-center gap-2 py-4">
                        {{ $item->product->image->img()->attributes([
                            'class' => 'h-32 w-32 object-contain',
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
            <dl class="p-4 rounded-2xl border-2 border-gray-700">
                <div class="flex items-center gap-2">
                    <dt>Suma bez DPH</dt>
                    <dd>{{ price_format(cart()->total() - cart()->tax()) }}</dd>
                </div>
                <div class="flex items-center gap-2">
                    <dt>Daň (20%)</dt>
                    <dd>{{ price_format(cart()->tax()) }}</dd>
                </div>
                @if ($this->deliveryMethods->firstWhere('key', $state['deliveryMethod'])['fee'] > 0)
                    <div class="flex items-center gap-2">
                        <dt>{{ $this->deliveryMethods->firstWhere('key', $state['deliveryMethod'])['name'] }}</dt>
                        <dd>{{ price_format($this->deliveryMethods->firstWhere('key', $state['deliveryMethod'])['fee']) }}</dd>
                    </div>
                @endif
                @if ($this->paymentMethods->firstWhere('key', $state['paymentMethod'])['fee'] > 0)
                    <div class="flex items-center gap-2">
                        <dt>{{ $this->paymentMethods->firstWhere('key', $state['paymentMethod'])['name'] }}</dt>
                        <dd>{{ price_format($this->paymentMethods->firstWhere('key', $state['paymentMethod'])['fee']) }}</dd>
                    </div>
                @endif
                <div class="flex items-center gap-2 text-2xl font-bold">
                    <dt>Celková suma</dt>
                    <dd>{{ price_format($this->total) }}</dd>
                </div>
            </dl>
        </div>
    </div>
    <div class="lg:order-1">
        @unless($order)
            <form
                wire:submit.prevent="order"
                class="flex flex-col gap-10"
            >
                @include('livewire.checkout.partials.general-details')
                @include('livewire.checkout.partials.shipping-details')
                @include('livewire.checkout.partials.delivery-method')
                @include('livewire.checkout.partials.payment-method')
                @include('livewire.checkout.partials.additional-details')
                <div>
                    <x-button
                        type="submit"
                        class="w-full"
                    >
                        Objednať s povinnosťou platby
                    </x-button>
                </div>
            </form>
        @else
            <form
                x-data="checkout('{{ config('services.stripe.key') }}', '{{ $this->intentSecret }}', '{{ route('pages.thanks') }}', @js($state))"
                @submit.prevent="pay"
                class="flex flex-col gap-10"
            >
                <div id="payment-element"></div>
                <p
                    x-show="error"
                    x-text="error"
                    class="text-red-500"
                    x-cloak
                ></p>
                <x-button
                    type="submit"
                    class="w-full"
                >
                    <span x-show="!isProcessing">Zaplatiť</span>
                    <span
                        x-show="isProcessing"
                        x-cloak
                    >Spracovávanie</span>
                </x-button>
            </form>
        @endunless

    </div>
</div>
