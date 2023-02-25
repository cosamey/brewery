<div
    id="general-details"
    x-data="{ purchasingAsCompany: $wire.entangle('state.purchasingAsCompany') }"
>
    <span class="text-3xl">01</span>
    <h2 class="text-4xl font-bold uppercase">
        Základné informácie
    </h2>
    <div class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5 sm:grid-cols-6">
        <x-form.group
            id="first-name"
            label="Meno"
            :error="$errors->first('state.customer.firstName')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.customer.firstName"
                autocomplete="given-name"
            />
        </x-form.group>
        <x-form.group
            id="last-name"
            label="Priezvisko"
            :error="$errors->first('state.customer.lastName')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.customer.lastName"
                autocomplete="family-name"
            />
        </x-form.group>
        <x-form.group
            id="phone"
            label="Telefón"
            :error="$errors->first('state.customer.phone')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.customer.phone"
                x-data=""
                x-mask="+429 999 999 999"
                type="tel"
                autocomplete="tel"
            />
        </x-form.group>
        <x-form.group
            id="email"
            label="Email"
            :error="$errors->first('state.customer.email')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.customer.email"
                type="email"
                autocomplete="email"
            />
        </x-form.group>
        <div class="sm:col-span-6">
            <label
                for="purchasing-as-company"
                class="flex items-center gap-2"
            >
                <input
                    id="purchasing-as-company"
                    x-model="purchasingAsCompany"
                    name="purchasing-as-company"
                    type="checkbox"
                    class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600"
                />
                <span class="text-xl">Nakupujem na firmu</span>
            </label>
        </div>
    </div>
    <div
        x-show="purchasingAsCompany"
        x-collapse
        x-cloak
    >
        <h3 class="mt-5 text-3xl font-bold uppercase">Údaje o spoločnosti</h3>
        <div class="mt-5 grid grid-cols-1 gap-x-10 gap-y-5 sm:grid-cols-6">
            <x-form.group
                id="company"
                label="Spoločnosť"
                :error="$errors->first('state.customer.company.name')"
                class="sm:col-span-6"
            >
                <x-form.input
                    wire:model.lazy="state.customer.company.name"
                    autocomplete="organization"
                />
            </x-form.group>
            <x-form.group
                id="business-no"
                label="IČO"
                :error="$errors->first('state.customer.company.businessNo')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.customer.company.businessNo" />
            </x-form.group>
            <x-form.group
                id="tax-no"
                label="DIČ"
                :error="$errors->first('state.customer.company.taxNo')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.customer.company.taxNo" />
            </x-form.group>
            <x-form.group
                id="vat-no"
                label="IČ DPH"
                :error="$errors->first('state.customer.company.vatNo')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.customer.company.vatNo" />
            </x-form.group>
        </div>
    </div>
</div>
