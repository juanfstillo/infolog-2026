@extends('layouts.app')

@section('title', 'La Empresa')
@section('description', 'Infolog S.R.L. custodia el Archivo Técnico Avellaneda de YPF: más de un millón de elementos catalogados desde 1909, certificados ISO 9001 y miembros de CEPERA.')

@section('content')

    {{-- INTRO --}}
    <section class="bg-navy-950 text-white">
        <div class="wrap py-20 sm:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-14 items-center">
                <div>
                    <span class="eyebrow eyebrow-on-dark">La Empresa</span>
                    <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl leading-tight max-w-[18ch]">La memoria técnica del Archivo Técnico Avellaneda, desde 1909.</h1>
                    <p class="mt-6 max-w-[58ch] text-lg text-[#d7dee4] leading-relaxed">
                        Infolog S.R.L. tiene a su cargo la custodia, administración, modernización y seguridad del
                        Archivo Técnico Avellaneda de YPF S.A. — el archivo de exploración petrolífera más importante
                        de América del Sur. Bajo inventario propio conservamos desde el informe técnico original del
                        pozo N.º&nbsp;5, perforado en 1909, hasta los datos sísmicos 3D de última generación de Vaca Muerta.
                    </p>
                </div>
                <img src="/images/infoEmpresa.png" alt="Infolog" class="w-48 justify-self-center lg:justify-self-end opacity-90">
            </div>
        </div>
    </section>

    {{-- STATS --}}
    <section class="bg-navy-900 border-t border-white/10">
        <div class="wrap grid grid-cols-2 lg:grid-cols-4 gap-y-8 py-9">
            @foreach ($stats as $i => $stat)
                <div class="px-0 lg:px-7 {{ $i % 2 === 1 ? 'border-l border-white/10 pl-6' : '' }} {{ $i > 0 ? 'lg:border-l lg:border-white/10 lg:pl-7' : '' }}">
                    <span class="stat-figure">{{ $stat['figure'] }}</span>
                    <span class="stat-label">{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- SERVICIOS --}}
    <section class="section bg-paper">
        <div class="wrap">
            <div class="max-w-[640px] mb-12">
                <span class="eyebrow">Qué hacemos</span>
                <h2 class="mt-3 text-2xl sm:text-3xl text-navy-950">Seis líneas de servicio, un mismo estándar de trazabilidad.</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($servicios as $slug => $servicio)
                    <a href="{{ route('servicios.show', $slug) }}" class="group block border border-line rounded overflow-hidden hover:border-amber transition">
                        <div class="aspect-[16/10] overflow-hidden bg-paper-tint">
                            <img src="{{ $servicio['image'] }}" alt="{{ $servicio['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300">
                        </div>
                        <div class="p-5">
                            <h3 class="text-base font-bold text-navy-950">{{ $servicio['title'] }}</h3>
                            <p class="mt-2 text-sm text-slate leading-relaxed">{{ $servicio['summary'] }}</p>
                            <span class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-amber-dark group-hover:text-amber">Conocé más →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ROADMAP --}}
    <section class="bg-navy-800 text-white">
        <div class="wrap section">
            <div class="max-w-[640px] mb-12">
                <span class="eyebrow eyebrow-on-dark">Hoja de ruta 2026</span>
                <h2 class="mt-3 text-2xl sm:text-3xl">Tres frentes de reconversión tecnológica</h2>
                <p class="mt-4 text-[#c3ced7] leading-relaxed">
                    La dirección de Infolog sostiene la necesidad de profundizar la reconversión tecnológica del
                    Archivo Técnico Avellaneda para responder a las demandas de un mercado corporativo cada vez
                    más digitalizado y exigente.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($roadmap as $item)
                    <div class="bg-navy-900 border border-white/10 rounded p-7">
                        <span class="font-mono text-xs text-amber tracking-widest">{{ $item['tag'] }}</span>
                        <h3 class="mt-3 text-lg font-bold">{{ $item['title'] }}</h3>
                        <p class="mt-2.5 text-sm text-[#c3ced7] leading-relaxed">{{ $item['body'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- MAP --}}
    <section class="bg-paper">
        <div class="wrap py-16">
            <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-10 items-start">
                <div>
                    <span class="eyebrow">Cómo llegar</span>
                    <h2 class="mt-3 text-2xl text-navy-950">Archivo Técnico Avellaneda</h2>
                    <p class="mt-4 text-slate leading-relaxed">
                        <a href="https://goo.gl/maps/RK9Gf2JY4i1VJ76i6" class="text-navy-800 font-medium hover:text-amber-dark">
                            {{ config('site.contact.address_full') }}
                        </a>
                    </p>
                    <p class="mt-2 text-sm text-slate-soft">Sede administrativa: {{ config('site.contact.admin_address') }}</p>
                    <p class="mt-4">
                        <a href="{{ config('site.contact.phone_href') }}" class="text-navy-800 font-medium hover:text-amber-dark">{{ config('site.contact.phone_display') }}</a>
                    </p>
                </div>
                <div class="rounded overflow-hidden border border-line">
                    <iframe
                        src="{{ config('site.contact.map_embed') }}"
                        width="100%" height="360" style="border:0;" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Ubicación del Archivo Técnico Avellaneda"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
