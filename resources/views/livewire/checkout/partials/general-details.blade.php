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
            :error="$errors->first('state.firstName')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.firstName"
                autocomplete="given-name"
            />
        </x-form.group>
        <x-form.group
            id="last-name"
            label="Priezvisko"
            :error="$errors->first('state.lastName')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.lastName"
                autocomplete="family-name"
            />
        </x-form.group>
        <x-form.group
            id="phone"
            label="Telefón"
            :error="$errors->first('state.phone')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.phone"
                x-data=""
                x-mask="+429 999 999 999"
                type="tel"
                autocomplete="tel"
            />
        </x-form.group>
        <x-form.group
            id="email"
            label="Email"
            :error="$errors->first('state.email')"
            class="sm:col-span-3"
            required
        >
            <x-form.input
                wire:model.lazy="state.email"
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
                :error="$errors->first('state.company.name')"
                class="sm:col-span-6"
            >
                <x-form.input
                    wire:model.lazy="state.company.name"
                    autocomplete="organization"
                />
            </x-form.group>
            <x-form.group
                id="business-id"
                label="IČO"
                :error="$errors->first('state.company.businessId')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.company.businessId" />
            </x-form.group>
            <x-form.group
                id="tax-id"
                label="DIČ"
                :error="$errors->first('state.company.taxId')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.company.taxId" />
            </x-form.group>
            <x-form.group
                id="vat-id"
                label="IČ DPH"
                :error="$errors->first('state.company.vatId')"
                class="sm:col-span-2"
            >
                <x-form.input wire:model.lazy="state.company.vatId" />
            </x-form.group>
        </div>
    </div>
</div>
