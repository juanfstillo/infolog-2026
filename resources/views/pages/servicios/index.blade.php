@extends('layouts.app')

@section('title', 'Servicios')
@section('description', 'Los seis servicios de Infolog para la gestión del archivo técnico: almacenamiento, digitalización, guarda de muestras y soportes, gestión de calidad y escaneo.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Servicios</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[22ch]">Seis líneas de servicio, un mismo estándar de trazabilidad.</h1>
            <p class="mt-5 max-w-[58ch] text-lg text-[#d7dee4]">Cada servicio sostiene una parte distinta de la cadena de custodia del Archivo Técnico Avellaneda.</p>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($servicios as $slug => $servicio)
                <a href="{{ route('servicios.show', $slug) }}" class="group block border border-line rounded overflow-hidden hover:border-amber transition">
                    <div class="aspect-[16/10] overflow-hidden bg-paper-tint">
                        <img src="{{ $servicio['image'] }}" alt="{{ $servicio['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300">
                    </div>
                    <div class="p-5">
                        <h2 class="text-base font-bold text-navy-950">{{ $servicio['title'] }}</h2>
                        <p class="mt-2 text-sm text-slate leading-relaxed">{{ $servicio['summary'] }}</p>
                        <span class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-amber-dark group-hover:text-amber">Conocé más →</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

@endsection
