<header class="sticky top-0 z-40 bg-navy-950 border-b border-white/10">
    <div class="wrap flex items-center justify-between h-[72px]">
        <a href="{{ route('home') }}" class="flex items-center gap-3" aria-label="Infolog Argentina — inicio">
            <img src="/images/infoEmpresa.png" alt="Infolog" class="h-8 w-auto">
        </a>

        <nav aria-label="Navegación principal" class="hidden lg:block">
            <ul class="flex gap-8 list-none m-0 p-0">
                @foreach (config('site.nav') as $item)
                    <li>
                        <a href="{{ route($item['route']) }}"
                           class="nav-link {{ request()->routeIs($item['route']) || request()->routeIs($item['route'].'.*') ? 'nav-link-current' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <a href="{{ route('contacto') }}" class="hidden lg:inline-flex btn-primary text-sm">Contacto</a>

        <button
            type="button"
            class="lg:hidden text-white p-2"
            aria-expanded="false"
            aria-controls="mobile-nav"
            onclick="document.getElementById('mobile-nav').classList.toggle('hidden'); this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'false' ? 'true' : 'false');"
        >
            <span class="sr-only">Abrir menú</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M3 6h18M3 12h18M3 18h18" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <div id="mobile-nav" class="hidden lg:hidden border-t border-white/10 bg-navy-950">
        <ul class="wrap list-none m-0 py-4 flex flex-col gap-1">
            @foreach (config('site.nav') as $item)
                <li>
                    <a href="{{ route($item['route']) }}"
                       class="block py-2.5 text-sm font-medium uppercase tracking-wide {{ request()->routeIs($item['route']) || request()->routeIs($item['route'].'.*') ? 'text-white' : 'text-[#c9d4dd]' }}">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
            <li class="pt-2">
                <a href="{{ route('contacto') }}" class="btn-primary text-sm inline-flex">Contacto</a>
            </li>
        </ul>
    </div>
</header>
