<div
    id="shipping-details"
    x-data="{ sameAddress: $wire.entangle('state.sameAddress') }"
>
    <span class="text-3xl">02</span>
    <h2 class="text-4xl font-bold uppercase">
        Adresa dodania
    </h2>
    <div class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5 sm:grid-cols-6">
        <x-form.group
            id="billing-address"
            label="Adresa"
            :error="$errors->first('state.shippingAddress.street')"
            class="sm:col-span-4"
            required
        >
            <x-form.input
                wire:model.lazy="state.shippingAddress.street"
                autocomplete="address-line1"
            />
        </x-form.group>
        <x-form.group
            id="billing-post-code"
            label="PSČ"
            :error="$errors->first('state.shippingAddress.postCode')"
            class="sm:col-span-2"
            required
        >
            <x-form.input
                wire:model.lazy="state.shippingAddress.postCode"
                x-data=""
                x-mask="999 99"
                autocomplete="postal-code"
            />
        </x-form.group>
        <x-form.group
            id="billing-city"
            label="Mesto"
            :error="$errors->first('state.shippingAddress.city')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.shippingAddress.city"
                autocomplete="address-level2"
            />
        </x-form.group>
        <x-form.group
            id="billing-country"
            label="Štát"
            :error="$errors->first('state.shippingAddress.countryCode')"
            class="sm:col-span-3"
            required
        >
            <x-form.select
                wire:model.lazy="state.shippingAddress.countryCode"
                :options="[['value' => 'SK', 'label' => 'Slovensko']]"
                autocomplete="country-name"
            />
        </x-form.group>
        <div class="sm:col-span-6">
            <label
                for="same-address"
                class="flex items-center gap-2"
            >
                <input
                    id="same-address"
                    x-model="sameAddress"
                    name="same-address"
                    type="checkbox"
                    class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600"
                />
                <span class="text-xl">Fakturačná adresa je rovnaká ako adresa dodania.</span>
            </label>
        </div>
    </div>
    <div
        x-show="! sameAddress"
        x-collapse
        x-cloak
    >
        <h3 class="mt-5 text-3xl font-bold uppercase">Fakturačná adresa</h3>
        <div class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5 sm:grid-cols-6">
            <x-form.group
                id="shipping-address"
                label="Adresa"
                :error="$errors->first('state.billingAddress.street')"
                class="sm:col-span-4"
            >
                <x-form.input
                    wire:model.lazy="state.billingAddress.street"
                    autocomplete="address-line1"
                />
            </x-form.group>
            <x-form.group
                id="shipping-post-code"
                label="PSČ"
                :error="$errors->first('state.billingAddress.postCode')"
                class="sm:col-span-2"
            >
                <x-form.input
                    wire:model.lazy="state.billingAddress.postCode"
                    x-data=""
                    x-mask="999 99"
                    autocomplete="postal-code"
                />
            </x-form.group>
            <x-form.group
                id="shipping-city"
                label="Mesto"
                :error="$errors->first('state.billingAddress.city')"
                class="sm:col-span-3"
            >
                <x-form.input
                    wire:model.lazy="state.billingAddress.city"
                    autocomplete="address-level2"
                />
            </x-form.group>
            <x-form.group
                id="shipping-country"
                label="Štát"
                :error="$errors->first('state.billingAddress.countryCode')"
                class="sm:col-span-3"
            >
                <x-form.select
                    wire:model.lazy="state.billingAddress.countryCode"
                    placeholder="Vyberte štát"
                    :options="[['value' => 'SK', 'label' => 'Slovensko']]"
                    autocomplete="country-name"
                />
            </x-form.group>
        </div>
    </div>
</div>
