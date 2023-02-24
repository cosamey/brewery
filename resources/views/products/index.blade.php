<x-layout>
    <section>
        <div class="mx-auto max-w-screen-2xl px-8 py-48">
            <div class="grid gap-10 md:grid-cols-4">
                <div>
                    <h1 class="text-6xl font-bold uppercase lg:text-7xl">
                        Craft <br /> <span class="underscore after:bg-rose">Beer</span>
                    </h1>
                </div>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:col-span-3 lg:grid-cols-3 xl:grid-cols-4">
                    @each('components.card.product.basic', $products, 'product')
                </div>
            </div>
        </div>
    </section>
</x-layout>
