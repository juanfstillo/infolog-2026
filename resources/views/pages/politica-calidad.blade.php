@extends('layouts.app')

@section('title', 'Política de Calidad')
@section('description', 'Política de Calidad de Infolog S.R.L., certificada bajo la norma internacional ISO 9001.')

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20">
            <span class="eyebrow eyebrow-on-dark">ISO 9001</span>
            <h1 class="mt-3 text-3xl sm:text-4xl max-w-[20ch]">Política de Calidad</h1>
            <a href="/docs/politica-de-calidad.pdf" download class="btn-ghost mt-7 inline-flex">Descargar PDF →</a>
        </div>
    </section>

    <section class="section bg-paper-tint">
        <div class="wrap">
            <div class="rounded border border-line overflow-hidden bg-white">
                <embed src="/docs/politica-de-calidad.pdf" type="application/pdf" width="100%" height="900px">
            </div>
        </div>
    </section>

@endsection
