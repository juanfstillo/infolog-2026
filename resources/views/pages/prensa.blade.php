@extends('layouts.app')

@section('title', 'Prensa')
@section('description', 'Infolog en los medios: cobertura periodística sobre la gestión del Archivo Técnico Avellaneda de YPF.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Prensa</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[22ch]">Infolog en los medios</h1>
            <p class="mt-5 max-w-[58ch] text-lg text-[#d7dee4]">Cobertura periodística sobre nuestro rol en la gestión del archivo de exploración petrolera más grande de Sudamérica.</p>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap flex flex-col gap-8">
            @foreach ($press as $item)
                <article class="border border-line rounded overflow-hidden">
                    <div class="bg-navy-800 text-white p-8 sm:p-10">
                        <span class="eyebrow eyebrow-on-dark">{{ $item['source'] }} · {{ $item['date'] }}</span>
                        <h2 class="mt-3 text-2xl sm:text-3xl font-extrabold leading-snug max-w-[30ch]" style="text-wrap:balance;">{{ $item['title'] }}</h2>
                        <p class="mt-4 text-sm text-[#a9b7c2]">Por {{ $item['author'] }}</p>
                    </div>
                    <div class="p-8 sm:p-10">
                        <blockquote class="text-xl font-semibold text-navy-950 leading-snug border-l-2 border-amber pl-5" style="text-wrap:balance;">
                            &ldquo;{{ $item['quote'] }}&rdquo;
                        </blockquote>
                        <p class="mt-6 text-slate leading-relaxed max-w-[70ch]">{{ $item['excerpt'] }}</p>
                        <a href="{{ $item['url'] }}" target="_blank" rel="noopener"
                           class="mt-6 inline-flex items-center gap-2 text-amber-dark font-semibold hover:text-amber">
                            Leer la nota completa en {{ $item['source'] }} →
                        </a>
                    </div>
                </article>
            @endforeach

            @if (count($press) === 0)
                <p class="text-slate">Todavía no hay menciones de prensa cargadas.</p>
            @endif
        </div>
    </section>

@endsection
