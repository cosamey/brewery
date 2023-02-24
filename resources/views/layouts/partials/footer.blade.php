<footer>
    <div class="mx-auto max-w-screen-2xl px-8 pt-20 pb-8">
        <div class="flex flex-col items-center justify-between gap-10 sm:flex-row">
            <div>
                <x-art.claim
                    class="h-20 w-auto fill-black"
                    aria-hidden="true"
                />
            </div>
            <div>
                <x-social-icons />
            </div>
        </div>
        <div class="mt-10 flex flex-col items-center justify-between gap-5 text-sm sm:flex-row">
            <ul class="flex items-center gap-5 sm:order-2">
                <li>
                    <a
                        href="{{ route('pages.terms') }}"
                        class="transition-opacity hover:opacity-50"
                    >
                        Obchodné podmienky
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('pages.privacy') }}"
                        class="transition-opacity hover:opacity-50"
                    >
                        Ochrana osobných údajov
                    </a>
                </li>
            </ul>
            <div class="sm:order-1">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Všetky práva vyhradené.</p>
            </div>
        </div>
    </div>
</footer>
