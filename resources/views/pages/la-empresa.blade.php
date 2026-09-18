@extends('layouts.app')

@section('title', 'La Empresa')
@section('description', 'Infolog S.R.L. es la empresa que custodia el Archivo Técnico Avellaneda de YPF: el archivo de exploración petrolífera más importante de América del Sur.')

@section('content')

    {{-- IDENTIDAD --}}
    <section class="bg-navy-950 text-white">
        <div class="wrap py-20 sm:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-14 items-center">
                <div>
                    <span class="eyebrow eyebrow-on-dark">La Empresa</span>
                    <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl leading-tight max-w-[18ch]">Custodios del Archivo Técnico Avellaneda.</h1>
                    <p class="mt-6 max-w-[56ch] text-lg text-[#d7dee4] leading-relaxed">
                        Infolog S.R.L. tiene a su cargo la custodia, administración, modernización y seguridad del
                        Archivo Técnico Avellaneda de YPF S.A.: el archivo de exploración petrolífera más importante
                        de América del Sur.
                    </p>
                    <p class="mt-4 max-w-[56ch] text-lg text-[#d7dee4] leading-relaxed">
                        Bajo nuestro inventario conviven el informe original del pozo N.º&nbsp;5, perforado en 1909,
                        y los datos sísmicos 3D de última generación de Vaca Muerta.
                    </p>
                </div>
                <img src="/images/infolog-logo.png" alt="Infolog Argentina" width="551" height="528" class="w-56 justify-self-center lg:justify-self-end">
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

    {{-- QUIÉNES SOMOS --}}
    <section class="section bg-paper">
        <div class="wrap">
            <div class="max-w-[640px] mb-12">
                <span class="eyebrow">Quiénes somos</span>
                <h2 class="mt-3 text-2xl sm:text-3xl text-navy-950">Una empresa de custodia documental, no un depósito.</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-line border border-line">
                <div class="bg-paper p-9">
                    <h3 class="text-xl text-navy-950">Responsabilidad institucional</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">
                        Damos soporte a YPF S.A., a la Secretaría de Energía de la Nación, a gobiernos provinciales
                        y a compañías privadas del sector energético.
                    </p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
                <div class="bg-paper p-9">
                    <h3 class="text-xl text-navy-950">Calidad certificada</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">
                        Sistema de Gestión de la Calidad certificado bajo norma ISO 9001 y membresía en CEPERA,
                        la Cámara de Empresas Petroenergéticas de la República Argentina.
                    </p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
                <div class="bg-paper p-9">
                    <h3 class="text-xl text-navy-950">Guarda activa</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">
                        No sólo conservamos: digitalizamos, remasterizamos y georreferenciamos el acervo para
                        mantenerlo consultable por las próximas generaciones de técnicos.
                    </p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
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
