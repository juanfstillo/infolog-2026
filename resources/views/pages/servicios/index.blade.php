@extends('layouts.app')

@section('title', 'Servicios')
@section('description', 'Los servicios de Infolog para la gestión del archivo técnico, encabezados por la digitalización de información geológica: escaneo, almacenamiento, guarda de muestras y soportes, y gestión de calidad.')

@section('content')

    @php
        $destacados = collect($servicios)->filter(fn ($s) => $s['featured'] ?? false);
        $resto = collect($servicios)->reject(fn ($s) => $s['featured'] ?? false);
    @endphp

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Servicios</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[22ch]">{{ count($servicios) }} líneas de servicio, un mismo estándar de trazabilidad.</h1>
            <p class="mt-5 max-w-[58ch] text-lg text-[#d7dee4]">Cada servicio sostiene una parte distinta de la cadena de custodia del Archivo Técnico Avellaneda.</p>
        </div>
    </section>

    {{-- SERVICIO DESTACADO: DIGITALIZACIÓN --}}
    @include('partials.digitalizacion-band')

    {{-- RESTO DE SERVICIOS --}}
    <section class="section bg-paper">
        <div class="wrap">
            @if ($destacados->isNotEmpty())
                <div class="max-w-[640px] mb-10">
                    <span class="eyebrow">El resto de nuestros servicios</span>
                    <h2 class="mt-3 text-2xl sm:text-3xl text-navy-950">La cadena completa de custodia</h2>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($resto as $slug => $servicio)
                    @include('partials.servicio-card', ['slug' => $slug, 'servicio' => $servicio, 'heading' => 'h3'])
                @endforeach
            </div>
        </div>
    </section>

@endsection
