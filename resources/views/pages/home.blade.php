@extends('layouts.app')

@section('title', 'Inicio')
@section('description', 'Infolog gestiona, preserva y moderniza más de un millón de registros geológicos y geofísicos de YPF: el archivo de exploración petrolera más grande de Sudamérica.')

@section('content')

    {{-- HERO --}}
    <section class="relative overflow-hidden text-white bg-navy-950">
        <div class="absolute inset-0 bg-cover bg-[position:center_38%]" style="background-image:url('/images/finalMain.jpg')"></div>
        <div class="absolute inset-0" style="background:linear-gradient(100deg, rgba(8,20,32,0.94) 0%, rgba(8,20,32,0.86) 40%, rgba(8,20,32,0.55) 78%)"></div>

        <div class="wrap relative py-28 sm:py-32">
            <span class="eyebrow eyebrow-on-dark">Archivo Técnico Avellaneda — en custodia desde 1909</span>
            <h1 class="mt-4 text-4xl sm:text-5xl lg:text-6xl leading-[1.06] max-w-[15ch] text-white">
                El archivo de exploración petrolera más grande de <span class="text-amber">Sudamérica</span>.
            </h1>
            <p class="mt-6 max-w-[52ch] text-lg text-[#d7dee4]">
                Infolog gestiona, preserva y moderniza más de un millón de registros geológicos y geofísicos de YPF: desde el informe del pozo N.º&nbsp;5 de 1909 hasta la sísmica 3D de Vaca Muerta.
            </p>
            <div class="mt-9">
                <a href="{{ route('la-empresa') }}" class="btn-primary">Conocé la empresa</a>
            </div>
        </div>
    </section>

    {{-- STAT STRIP --}}
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

    {{-- THREE PILLARS --}}
    <section class="section bg-paper">
        <div class="wrap">
            <div class="max-w-[640px] mb-12">
                <span class="eyebrow">Por qué Infolog</span>
                <h2 class="mt-3 text-2xl sm:text-3xl text-navy-950">No es guarda de documentos. Es la memoria técnica del subsuelo argentino.</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-line border border-line">
                <div class="bg-paper p-9">
                    <span class="eyebrow text-amber-dark">Escala</span>
                    <h3 class="mt-3.5 text-xl text-navy-950">Irremplazable por diseño</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">Más de un millón de elementos catalogados en 11.000 m², con historia documental ininterrumpida desde 1909. No existe otro archivo de exploración petrolera de este tamaño en América del Sur.</p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
                <div class="bg-paper p-9">
                    <span class="eyebrow text-amber-dark">Confianza</span>
                    <h3 class="mt-3.5 text-xl text-navy-950">Custodios del archivo técnico de YPF</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">A cargo del Archivo Técnico Avellaneda. Damos soporte a la Secretaría de Energía de la Nación, gobiernos provinciales y compañías privadas. Miembros de CEPERA, certificados ISO 9001.</p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
                <div class="bg-paper p-9">
                    <span class="eyebrow text-amber-dark">Modernización</span>
                    <h3 class="mt-3.5 text-xl text-navy-950">Guarda activa, no pasiva</h3>
                    <p class="mt-3 text-[0.96rem] text-slate leading-relaxed">Remasterizamos soportes magnéticos obsoletos, georreferenciamos con GPS la sísmica 3D que aún está en papel y actualizamos nuestros laboratorios de forma continua.</p>
                    <div class="w-[34px] h-0.5 bg-amber mt-5"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICIO DESTACADO: DIGITALIZACIÓN --}}
    @include('partials.digitalizacion-band')

    {{-- ROADMAP / SUPPORT IMAGE --}}
    <section class="bg-paper py-24">
        <div class="wrap">
            <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-14 items-center">
                <img src="/images/escaner.jpg" alt="Sala de escaneo de Infolog" class="rounded border border-line w-full">
                <div>
                    <span class="eyebrow">Hoja de ruta 2026</span>
                    <h2 class="mt-3 text-2xl sm:text-3xl text-navy-950">Tres frentes de reconversión tecnológica</h2>
                    <p class="mt-4 text-slate leading-relaxed">La dirección de Infolog profundiza la modernización del Archivo Técnico Avellaneda para responder a un mercado cada vez más digitalizado.</p>
                    <ul class="mt-6 flex flex-col gap-4 list-none p-0 m-0">
                        @foreach ($roadmap as $item)
                            <li class="flex gap-3.5 items-baseline text-[0.94rem] text-navy-800">
                                <span class="font-mono text-xs text-amber-dark bg-amber-tint px-2 py-0.5 rounded whitespace-nowrap">{{ $item['tag'] }}</span>
                                <span><strong class="font-semibold">{{ $item['title'] }}</strong> — {{ $item['body'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- PRESS --}}
    @if ($press)
        <section class="bg-navy-800 text-white">
            <div class="wrap section grid grid-cols-1 lg:grid-cols-[1.1fr_1fr] gap-14 items-center">
                <div>
                    <span class="eyebrow eyebrow-on-dark">Prensa</span>
                    <p class="mt-3.5 text-2xl sm:text-3xl font-extrabold leading-snug" style="text-wrap:balance;">
                        &ldquo;{{ $press['quote'] }}&rdquo;
                    </p>
                    <p class="mt-5 text-sm text-[#a9b7c2]">— {{ $press['source'] }} · <strong class="text-white font-semibold">{{ $press['author'] }}</strong>, {{ $press['date'] }}</p>
                </div>
                <div class="bg-navy-900 border border-white/10 rounded p-7">
                    <span class="eyebrow eyebrow-on-dark">{{ $press['title'] }}</span>
                    <p class="mt-3.5 text-sm text-[#c3ced7] leading-relaxed">{{ $press['excerpt'] }}</p>
                    <a href="{{ route('prensa') }}" class="mt-4 inline-flex items-center gap-1.5 text-amber font-semibold text-sm hover:text-amber-light">
                        Leer la nota completa →
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- TRUST --}}
    <section class="bg-paper-tint border-y border-line">
        <div class="wrap py-10 flex items-center justify-center flex-wrap gap-5">
            <span class="text-sm text-slate-soft font-medium whitespace-nowrap">Trabajamos con</span>
            <div class="flex gap-9 flex-wrap items-center">
                <span class="font-mono text-sm font-medium text-navy-700 tracking-wide">YPF S.A.</span>
            </div>
        </div>
    </section>

    {{-- CTA BAND --}}
    <section class="bg-navy-950 text-white">
        <div class="wrap py-16 flex items-center justify-between gap-8 flex-wrap">
            <h2 class="text-2xl sm:text-3xl max-w-[20ch]">La memoria técnica de la exploración argentina, en custodia permanente.</h2>
            <div class="flex gap-4 flex-wrap">
                <a href="{{ route('contacto') }}" class="btn-primary">Contactar a Infolog</a>
                <a href="{{ route('servicios.index') }}" class="btn-ghost">Ver todos los servicios</a>
            </div>
        </div>
    </section>

@endsection
