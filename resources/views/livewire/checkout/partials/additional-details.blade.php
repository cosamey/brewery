<div id="additional-details">
    <span class="text-3xl">05</span>
    <h2 class="text-4xl font-bold uppercase">
        Doplňujúce informácie
    </h2>
    <div class="mt-5 grid gap-x-10 gap-y-5 md:grid-cols-6">
        <x-form.group
            id="notes"
            label="Poznámky"
            :error="$errors->first('state.notes')"
            class="md:col-span-6"
        >
            <x-form.textarea wire:model.lazy="state.notes" />
        </x-form.group>
    </div>
</div>
<div>
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
