@extends('layouts.app')

@section('title', 'Nuestro Cliente')
@section('description', 'La política de calidad de Infolog S.R.L. se orienta a satisfacer permanentemente las necesidades y expectativas de YPF.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Nuestro Cliente</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[20ch]">YPF S.A.</h1>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap max-w-[760px] text-center mx-auto">
            <img src="/images/logo-ypf.jpg" alt="YPF" class="mx-auto rounded w-32 h-32 object-cover">
            <p class="mt-8 text-xl text-navy-950 leading-relaxed" style="text-wrap:balance;">
                Los objetivos de Infolog S.R.L. están íntimamente relacionados con su política de calidad, orientada
                a satisfacer permanentemente las necesidades y expectativas de YPF S.A. — propietaria del Archivo
                Técnico Avellaneda que custodiamos, administramos y modernizamos.
            </p>
            <a href="https://www.ypf.com/Paginas/home.aspx" target="_blank" rel="noopener" class="btn-primary mt-8 inline-flex">
                Conocé más sobre YPF
            </a>
        </div>
    </section>

@endsection
