<x-layout>
    <section id="hero">
        <div
            class="relative overflow-hidden bg-blue"
            style="clip-path: polygon(0 0, 100% 0, 100% calc(100% - 5%), 0 100%);"
        >
            <div class="mx-auto max-w-screen-2xl px-8 pt-40 pb-80 md:py-48">
                <div class="grid grid-cols-1 gap-10 md:grid-cols-2 md:gap-20">
                    <div>
                        <h1 class="text-7xl font-bold uppercase lg:text-8xl">
                            <span class="underscore after:!h-7 after:bg-rose">Respect</span> <br />for craft
                        </h1>
                        <p class="mt-10 text-2xl text-gray-700">
                            Lorem ipsum dolor sit amet consectetur. Arcu lacus ultrices at pellentesque. Ut mattis
                            auctor risus lobortis duis faucibus. Aliquam amet sem ut mi rhoncus amet orci. Adipiscing
                            vulputate est id nulla justo viverra enim viverra ac.
                        </p>
                        <x-button
                            as="link"
                            href="#about"
                            class="mt-16 !px-16 !py-6 text-3xl"
                        >Zistiť viac</x-button>
                    </div>
                    <div class="relative z-10">
                        <div class="absolute w-full">
                            <x-art.eight
                                class="h-auto w-full fill-black"
                                aria-hidden="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute right-10 bottom-80 -z-10 md:right-20 md:bottom-32">
                <x-circle class="h-24 w-24 fill-white md:h-32 md:w-32" />
            </div>
            <div class="absolute top-36 left-2/3 -z-10 md:left-1/2 md:-translate-x-40">
                <x-circle class="h-24 w-24 fill-yellow" />
            </div>
            <div class="absolute bottom-20 left-2/3 -z-10 md:left-1/2 md:-translate-x-80">
                <x-circle class="h-24 w-24 fill-rose" />
            </div>
        </div>
    </section>

    <section id="featured-products">
        <div class="px-16 py-32">
            <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-3">
                <div class="text-right lg:order-2 lg:col-span-1">
                    <h2 class="text-5xl lg:text-6xl xl:text-7xl font-bold uppercase">
                        <span class="underscore after:bg-blue">Discover</span> <br />our products
                    </h2>
                    <p class="mt-10 text-xl text-gray-700">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas odio quae aperiam mollitia?
                        Qui autem dicta nesciunt illum suscipit hic veritatis, cum voluptatibus alias eaque
                        eveniet architecto unde, asperiores ad!
                    </p>
                    <x-button
                        as="link"
                        href="{{ route('products.index') }}"
                        class="mt-14"
                        color="blue"
                    >Všetky produkty</x-button>
                </div>
                <div class="lg:order-1 lg:col-span-2">
                    <div class="flex flex-col md:flex-row items-center gap-10">
                        @each('components.card.product.featured', $featuredProducts, 'product')
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
