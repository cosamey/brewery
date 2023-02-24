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
        <x-form.radio-card value="card">
            <span class="font-medium text-gray-900">Platobná karta</span>
        </x-form.radio-card>
        <x-form.radio-card value="cash">
            <span class="font-medium text-gray-900">Dobierka</span>
        </x-form.radio-card>
        <x-form.radio-card value="transfer">
            <span class="font-medium text-gray-900">Bankový prevod</span>
        </x-form.radio-card>
    </div>
</div>
