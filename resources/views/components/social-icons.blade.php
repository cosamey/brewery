<ul {{ $attributes->class('flex items-center gap-2') }}>
    <li>
        <a
            href="https://facebook.com/dv8.beer"
            target="_blank"
            class="group relative block"
            aria-label="Odkaz na Facebook"
        >
            <x-circle class="h-12 w-12 fill-black transition-colors duration-300 group-hover:fill-rose" />
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <x-icon.social.facebook class="h-5 w-5 fill-white" />
            </div>
        </a>
    </li>
    <li>
        <a
            href="https://instagram.com/dv8.beer"
            target="_blank"
            class="group relative block"
            aria-label="Odkaz na Instagram"
        >
            <x-circle class="h-12 w-12 fill-black transition-colors duration-300 group-hover:fill-rose" />
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                <x-icon.social.instagram class="h-5 w-5 fill-white" />
            </div>
        </a>
    </li>
</ul>
