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
        <div class="md:col-span-6">
            <label
                for="consent"
                class="flex items-center gap-2"
            >
                <input
                    id="consent"
                    wire:model="state.consent"
                    name="consent"
                    type="checkbox"
                    class="h-5 w-5 rounded text-indigo-600 focus:ring-indigo-600"
                    required
                />
                <span class="text-xl">
                    Súhlasím s
                    <a
                        href="{{ route('pages.terms') }}"
                        target="_blank"
                        class="underline transition-opacity hover:opacity-50"
                    >obchodnými podmienkami</a> a
                    <a
                        href="{{ route('pages.privacy') }}"
                        target="_blank"
                        class="underline transition-opacity hover:opacity-50"
                    >zásadami o ochrane osobných údajov</a>.
                </span>
            </label>
        </div>
    </div>
    <div>
        <x-button
            type="submit"
            class="w-full"
        >
            Objednať s povinnosťou platby
        </x-button>
    </div>
</form>
