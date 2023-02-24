<header x-data="{ open: false }">
    <div class="absolute inset-x-0 top-0 z-20">
        <div class="mx-auto max-w-screen-2xl px-8 py-8">
            <div class="flex items-center justify-between gap-5">
                <div>
                    <a
                        href="/"
                        aria-label="Späť na úvod"
                    >
                        <x-art.logo
                            class="h-6 w-auto fill-black md:h-8"
                            aria-hidden="true"
                        />
                    </a>
                </div>
                <div class="flex items-center gap-2.5 md:gap-5">
                    <nav class="hidden md:flex md:items-center md:gap-2">
                        <a
                            href="/"
                            class="px-4 py-2 text-lg font-medium uppercase"
                        >Úvod</a>
                        <a
                            href="/#about"
                            class="px-4 py-2 text-lg font-medium uppercase"
                        >O pivovare</a>
                        <a
                            href="/#products"
                            class="px-4 py-2 text-lg font-medium uppercase"
                        >Produkty</a>
                    </nav>
                    <x-social-icons class="hidden md:flex md:items-center md:gap-2" />
                    <div class="relative md:hidden">
                        <button
                            class="relative block"
                            aria-label="Otvoriť/zatvoriť mobilné menu"
                            @click="open = ! open"
                        >
                            <x-circle class="h-12 w-12 fill-black transition-colors duration-300" />
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <x-icon.bars
                                    x-show="!open"
                                    class="h-5 w-5 text-white"
                                    aria-hidden="true"
                                />
                                <x-icon.x
                                    x-show="open"
                                    class="h-5 w-5 text-white"
                                    aria-hidden="true"
                                    x-cloak
                                />
                            </div>
                        </button>
                        <div
                            x-show="open"
                            x-collapse
                            class="absolute top-20 right-0"
                            x-cloak
                        >
                            <nav class="flex w-40 flex-col gap-1 rounded-2xl bg-black py-2 text-right text-white shadow-[0_0_20px_rgba(0,0,0,.25)]">
                                <a
                                    href="/"
                                    class="px-4 py-1 text-lg font-medium uppercase"
                                >Úvod</a>
                                <a
                                    href="/#about"
                                    class="px-4 py-1 text-lg font-medium uppercase"
                                >O pivovare</a>
                                <a
                                    href="/#products"
                                    class="px-4 py-1 text-lg font-medium uppercase"
                                >Produkty</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
