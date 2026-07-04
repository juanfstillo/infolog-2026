@extends('layouts.app')

@section('title', 'Contacto')
@section('description', 'Contactá a Infolog Argentina: dirección, teléfono y correo del Archivo Técnico Avellaneda.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Contacto</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[20ch]">Hablemos</h1>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap">
            <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-10 items-start">
                <div class="flex flex-col gap-7">
                    <div>
                        <h2 class="eyebrow">Archivo Técnico Avellaneda</h2>
                        <a href="https://goo.gl/maps/RK9Gf2JY4i1VJ76i6" class="mt-2 block text-lg text-navy-950 font-medium hover:text-amber-dark">
                            {{ config('site.contact.address_full') }}
                        </a>
                    </div>
                    <div>
                        <h2 class="eyebrow">Sede administrativa</h2>
                        <p class="mt-2 text-lg text-navy-950 font-medium">{{ config('site.contact.admin_address') }}</p>
                    </div>
                    <div>
                        <h2 class="eyebrow">Email</h2>
                        <a href="mailto:{{ config('site.contact.email') }}" class="mt-2 block text-lg text-navy-950 font-medium hover:text-amber-dark">
                            {{ config('site.contact.email') }}
                        </a>
                    </div>
                    <div>
                        <h2 class="eyebrow">Teléfono</h2>
                        <a href="{{ config('site.contact.phone_href') }}" class="mt-2 block text-lg text-navy-950 font-medium hover:text-amber-dark">
                            {{ config('site.contact.phone_display') }}
                        </a>
                    </div>
                </div>
                <div class="rounded overflow-hidden border border-line">
                    <iframe
                        src="{{ config('site.contact.map_embed') }}"
                        width="100%" height="420" style="border:0;" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Ubicación del Archivo Técnico Avellaneda"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
