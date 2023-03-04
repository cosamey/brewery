<div id="delivery-method">
    <span class="text-3xl">03</span>
    <h2 class="text-4xl font-bold uppercase">
        Spôsob dodania
    </h2>
    <div
        x-data="{ deliveryMethod: $wire.entangle('state.deliveryMethod') }"
        x-radio
        x-model="deliveryMethod"
        class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5 sm:grid-cols-2"
    >
        @foreach ($this->deliveryMethods as $deliveryMethod)
            <x-form.radio-card
                :value="$deliveryMethod['key']"
                wire:key="{{ $deliveryMethod['key'] }}"
                mark
            >
                <span class="font-medium text-gray-900">{{ $deliveryMethod['name'] }}</span>
                <span class="mt-1 text-sm text-gray-500">{{ $deliveryMethod['description'] }}</span>
                <span class="mt-5 font-medium text-gray-900">
                    @if ($deliveryMethod['fee'] === 0)
                        Zadarmo
                    @else
                        {{ price_format($deliveryMethod['fee']) }}
                    @endif
                </span>
                <x-slot:icon>
                    <x-icon.check-circle
                        class="h-5 w-5 self-start text-indigo-600"
                        ::class="{ 'invisible': !$radioOption.isChecked }"
                        aria-hidden="true"
                    />
                    </x-slot>
            </x-form.radio-card>
        @endforeach
    </div>
</div>
