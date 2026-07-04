@extends('layouts.app')

@section('title', $servicio['title'])
@section('description', $servicio['summary'])

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark"><a href="{{ route('servicios.index') }}" class="hover:text-white">Servicios</a> / {{ $servicio['title'] }}</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[26ch]">{{ $servicio['title'] }}</h1>
            <p class="mt-5 max-w-[58ch] text-lg text-[#d7dee4]">{{ $servicio['summary'] }}</p>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-14 items-start">
                <img src="{{ $servicio['image'] }}" alt="{{ $servicio['title'] }}" class="w-full rounded border border-line">
                <div class="flex flex-col gap-5">
                    @foreach ($servicio['body'] as $paragraph)
                        <p class="text-slate leading-relaxed text-[1.02rem]">{{ $paragraph }}</p>
                    @endforeach
                    <a href="{{ route('contacto') }}" class="btn-primary self-start mt-2">Consultar por este servicio</a>
                </div>
            </div>
        </div>
    </section>

    @if ($otrosServicios->isNotEmpty())
        <section class="bg-paper-tint border-t border-line">
            <div class="wrap section">
                <span class="eyebrow">Otros servicios</span>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($otrosServicios as $slug => $otro)
                        <a href="{{ route('servicios.show', $slug) }}" class="group block border border-line rounded overflow-hidden bg-white hover:border-amber transition">
                            <div class="aspect-[16/10] overflow-hidden">
                                <img src="{{ $otro['image'] }}" alt="{{ $otro['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition duration-300">
                            </div>
                            <div class="p-5">
                                <h3 class="text-base font-bold text-navy-950">{{ $otro['title'] }}</h3>
                                <span class="mt-2 inline-flex items-center gap-1 text-sm font-semibold text-amber-dark group-hover:text-amber">Conocé más →</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
