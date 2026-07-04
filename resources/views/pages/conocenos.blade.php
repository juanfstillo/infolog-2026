@extends('layouts.app')

@section('title', 'Conocenos')
@section('description', 'Un recorrido audiovisual por el Archivo Técnico Avellaneda de Infolog.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">Conocenos</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[22ch]">Un recorrido por el Archivo Técnico Avellaneda</h1>
        </div>
    </section>

    <section class="section bg-paper">
        <div class="wrap">
            <video
                class="w-full rounded border border-line"
                poster="/images/infolog-conocenos.jpg"
                controls
                preload="none"
            >
                <source src="/videos/infolog-institucional.mp4" type="video/mp4">
                Tu navegador no admite la reproducción de este video.
            </video>
        </div>
    </section>

@endsection
