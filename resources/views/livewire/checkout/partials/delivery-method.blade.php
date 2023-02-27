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
        <x-form.radio-card
            value="pickup"
            mark
        >
            <span class="font-medium text-gray-900">Osobný odber</span>
            <span class="mt-1 text-sm text-gray-500">Ihneď</span>
            <span class="mt-5 font-medium text-gray-900">Zadarmo</span>
            <x-slot:icon>
                <x-icon.check-circle
                    class="h-5 w-5 self-start text-indigo-600"
                    ::class="{ 'invisible': !$radioOption.isChecked }"
                    aria-hidden="true"
                />
                </x-slot>
        </x-form.radio-card>
        <x-form.radio-card
            value="courier"
            mark
        >
            <span class="font-medium text-gray-900">Kuriér</span>
            <span class="mt-1 text-sm text-gray-500">2 - 3 pracovné dni</span>
            <span class="mt-5 font-medium text-gray-900">{{ price_format(5) }}</span>
            <x-slot:icon>
                <x-icon.check-circle
                    class="h-5 w-5 self-start text-indigo-600"
                    ::class="{ 'invisible': !$radioOption.isChecked }"
                    aria-hidden="true"
                />
                </x-slot>
        </x-form.radio-card>
    </div>
</div>
