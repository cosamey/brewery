<div id="payment-method">
    <span class="text-3xl">04</span>
    <h2 class="text-4xl font-bold uppercase">
        Spôsob platby
    </h2>
    <div
        x-data="{ paymentMethod: $wire.entangle('state.paymentMethod') }"
        x-radio
        x-model="paymentMethod"
        class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5"
    >
        @foreach ($this->paymentMethods as $paymentMethod)
            <x-form.radio-card :value="$paymentMethod['key']" wire:key="{{ $paymentMethod['key'] }}">
                <span class="font-medium text-gray-900">
                    {{ $paymentMethod['name'] }}
                    @if ($paymentMethod['description'])
                        <span class="text-gray-500">{{ $paymentMethod['description'] }}</span>
                    @endif
                </span>
                <x-slot:icon>
                    <x-dynamic-component
                        :component="'icon.'.$paymentMethod['icon']"
                        :class="{ 'text-indigo-600': $radioOption.isChecked }"
                        class="h-6 w-6"
                        aria-hidden="true"
                    />
                    </x-slot>
            </x-form.radio-card>
        @endforeach
    </div>
</div>
