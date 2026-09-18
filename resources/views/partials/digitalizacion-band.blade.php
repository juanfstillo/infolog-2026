@php
    $slug = 'digitalizacion-geologica';
    $destacado = config("site.servicios.$slug");
@endphp

@if ($destacado)
    <section class="bg-navy-800 text-white border-y border-white/10">
        <div class="wrap section">
            <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_1fr] gap-12 items-center">
                <div>
                    <span class="badge-featured">{{ $destacado['badge'] }}</span>
                    <h2 class="mt-4 text-3xl sm:text-4xl leading-tight">
                        {{ $destacado['headline'] }}
                        <span class="block text-amber">{{ $destacado['title'] }}</span>
                    </h2>
                    <p class="mt-5 max-w-[56ch] text-lg text-[#d7dee4] leading-relaxed">{{ $destacado['pitch'] }}</p>

                    <ul class="mt-7 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3 list-none p-0 m-0">
                        @foreach ($destacado['highlights'] as $highlight)
                            <li class="flex gap-2.5 items-start text-[0.95rem] text-[#c3ced7]">
                                <span class="text-amber mt-px" aria-hidden="true">▸</span>
                                <span>{{ $highlight }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9 flex flex-wrap gap-4">
                        <a href="{{ route('servicios.show', $slug) }}" class="btn-primary">Ver el servicio de digitalización</a>
                        <a href="{{ route('contacto') }}" class="btn-ghost">Pedir una cotización</a>
                    </div>
                </div>

                <div class="rounded overflow-hidden border border-white/15 bg-navy-900">
                    <img
                        src="{{ $destacado['image'] }}"
                        alt="{{ $destacado['title'] }}"
                        loading="lazy"
                        class="w-full aspect-[4/3] object-cover"
                    >
                </div>
            </div>
        </div>
    </section>
@endif
