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
