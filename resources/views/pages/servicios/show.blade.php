@extends('layouts.app')

@section('title', $servicio['title'])
@section('description', $servicio['summary'])

@section('content')

    @php
        $fit = $servicio['image_fit'] ?? 'cover';
        $esDestacado = $servicio['featured'] ?? false;
    @endphp

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark"><a href="{{ route('servicios.index') }}" class="hover:text-white">Servicios</a> / {{ $servicio['title'] }}</span>
            @if ($esDestacado)
                <p class="mt-4"><span class="badge-featured">{{ $servicio['badge'] }}</span></p>
            @endif
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[26ch]">{{ $servicio['title'] }}</h1>
            <p class="mt-5 max-w-[58ch] text-lg text-[#d7dee4]">{{ $servicio['summary'] }}</p>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.1fr] gap-14 items-start">
                <div class="rounded border border-line overflow-hidden aspect-[4/3] {{ $fit === 'contain' ? 'bg-white p-8' : 'bg-paper-tint' }}">
                    <img
                        src="{{ $servicio['image'] }}"
                        alt="{{ $servicio['title'] }}"
                        class="w-full h-full {{ $fit === 'contain' ? 'object-contain' : 'object-cover' }}"
                    >
                </div>
                <div class="flex flex-col gap-5">
                    @foreach ($servicio['body'] as $paragraph)
                        <p class="text-slate leading-relaxed text-[1.02rem]">{{ $paragraph }}</p>
                    @endforeach

                    @if ($esDestacado && ! empty($servicio['highlights']))
                        <ul class="mt-1 flex flex-col gap-2.5 list-none p-0 m-0">
                            @foreach ($servicio['highlights'] as $highlight)
                                <li class="flex gap-2.5 items-start text-[0.97rem] text-navy-800">
                                    <span class="text-amber-dark" aria-hidden="true">▸</span>
                                    <span>{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

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
                    @foreach ($otrosServicios as $otroSlug => $otro)
                        @include('partials.servicio-card', ['slug' => $otroSlug, 'servicio' => $otro, 'heading' => 'h3', 'compact' => true])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
