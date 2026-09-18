@extends('layouts.app')

@section('title', 'Política de Calidad')
@section('description', 'Política de Calidad de Infolog S.R.L., certificada bajo la norma internacional ISO 9001. Documento DG-01, revisión 05.')

@php
    $doc = config('site.documents.politica_calidad');
@endphp

@section('content')

    <section class="bg-navy-950 text-white">
        <div class="wrap py-20 text-center">
            <span class="eyebrow eyebrow-on-dark">ISO 9001</span>
            <h1 class="mt-3 text-3xl sm:text-4xl">Política de calidad</h1>
            <p class="mt-5 mx-auto max-w-[56ch] text-lg text-[#d7dee4] leading-relaxed">
                El compromiso formal de Infolog S.R.L. con la custodia, la trazabilidad y la mejora continua
                del Archivo Técnico Avellaneda.
            </p>
            <p class="mt-4 font-mono text-xs uppercase tracking-widest text-[#8fa1b0]">{{ $doc['code'] }}</p>
        </div>
    </section>

    <section class="section bg-paper-tint">
        <div class="wrap">
            <div
                id="pdf-viewer"
                class="mx-auto max-w-[900px] overflow-hidden rounded border border-navy-800 bg-navy-950 shadow-2xl"
                data-pdf-url="{{ $doc['path'] }}"
            >
                {{-- Controles --}}
                <div class="pdf-toolbar">
                    <button type="button" id="pdf-zoom-out" class="pdf-btn" aria-label="Alejar el documento">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path d="M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </button>

                    <span id="pdf-zoom-level" class="pdf-zoom-level" role="status" aria-live="polite">100&nbsp;%</span>

                    <button type="button" id="pdf-zoom-in" class="pdf-btn" aria-label="Agrandar el documento">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                        </svg>
                    </button>

                    <button type="button" id="pdf-zoom-reset" class="pdf-btn" aria-label="Ajustar el documento al ancho">
                        Ajustar
                    </button>

                    <span class="mx-1 hidden h-6 w-px bg-white/15 sm:block" aria-hidden="true"></span>

                    <a
                        href="{{ $doc['path'] }}"
                        download="{{ $doc['filename'] }}"
                        class="pdf-btn border-amber bg-amber text-navy-950 hover:bg-amber-light hover:text-navy-950"
                    >
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                            <path d="M12 3v12m0 0l-4.5-4.5M12 15l4.5-4.5M4 19h16" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Descargar PDF
                    </a>
                </div>

                {{-- Documento --}}
                <div id="pdf-stage" class="pdf-stage">
                    <p id="pdf-status" class="py-16 text-center text-sm text-[#9fb0bd]">Cargando el documento…</p>
                </div>
            </div>

            <noscript>
                <div class="mx-auto mt-6 max-w-[900px] rounded border border-line bg-white p-6 text-center">
                    <p class="text-slate">Activá JavaScript para ver el documento en línea.</p>
                    <a href="{{ $doc['path'] }}" download="{{ $doc['filename'] }}" class="btn-primary mt-4">Descargar PDF</a>
                </div>
            </noscript>
        </div>
    </section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
(function () {
    var viewer = document.getElementById('pdf-viewer');
    if (!viewer) return;

    var stage = document.getElementById('pdf-stage');
    var status = document.getElementById('pdf-status');
    var label = document.getElementById('pdf-zoom-level');
    var btnIn = document.getElementById('pdf-zoom-in');
    var btnOut = document.getElementById('pdf-zoom-out');
    var btnFit = document.getElementById('pdf-zoom-reset');
    var url = viewer.dataset.pdfUrl;
    var titulo = 'Política de Calidad de Infolog S.R.L.';

    var MIN = 0.25, MAX = 4, FIT_MAX = 1.6;
    var entries = [], baseWidth = 1;
    var scale = 1, fitScale = 1, rendering = false, pendingScale = null;

    // Si PDF.js no está disponible (CDN bloqueado), caemos a un visor nativo.
    function fallback(err) {
        stage.innerHTML =
            '<iframe src="' + url + '" title="' + titulo + '" ' +
            'style="width:100%;height:70vh;border:0;background:#fff;border-radius:3px"></iframe>';
        [btnIn, btnOut, btnFit].forEach(function (b) { b.disabled = true; });
        label.textContent = 'Visor nativo';
        if (err) console.warn('[pdf-viewer]', err);
    }

    if (typeof pdfjsLib === 'undefined') {
        fallback('pdf.js no se pudo cargar');
        return;
    }

    pdfjsLib.GlobalWorkerOptions.workerSrc =
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    function clamp(value) {
        return Math.min(MAX, Math.max(MIN, value));
    }

    function availableWidth() {
        var cs = getComputedStyle(stage);
        return stage.clientWidth - parseFloat(cs.paddingLeft) - parseFloat(cs.paddingRight);
    }

    function computeFit() {
        return clamp(Math.min(availableWidth() / baseWidth, FIT_MAX));
    }

    // 100 % = el documento ajustado al ancho del visor.
    function setLabel(value) {
        label.innerHTML = Math.round(value / fitScale * 100) + '&nbsp;%';
        btnIn.disabled = value >= MAX - 0.001;
        btnOut.disabled = value <= MIN + 0.001;
    }

    // Cada pasada dibuja en un canvas nuevo y lo intercambia: PDF.js no admite
    // reusar un canvas que ya participó de un render.
    function renderAll() {
        if (rendering) return;
        rendering = true;

        var dpr = Math.min(window.devicePixelRatio || 1, 2);

        var jobs;
        try {
            jobs = entries.map(function (entry, i) {
                var viewport = entry.page.getViewport({ scale: scale });
                var canvas = document.createElement('canvas');

                canvas.width = Math.floor(viewport.width * dpr);
                canvas.height = Math.floor(viewport.height * dpr);
                canvas.style.width = Math.floor(viewport.width) + 'px';
                canvas.style.height = Math.floor(viewport.height) + 'px';
                canvas.setAttribute('role', 'img');
                canvas.setAttribute('aria-label', titulo + ', página ' + (i + 1));
                if (i > 0) canvas.style.marginTop = '1rem';

                return entry.page.render({
                    canvasContext: canvas.getContext('2d'),
                    viewport: viewport,
                    transform: dpr !== 1 ? [dpr, 0, 0, dpr, 0, 0] : null,
                }).promise.then(function () {
                    entry.canvas.replaceWith(canvas);
                    entry.canvas = canvas;
                });
            });
        } catch (err) {
            rendering = false;
            fallback(err);
            return;
        }

        Promise.all(jobs).then(function () {
            rendering = false;
            setLabel(scale);

            // Aplicamos el zoom que se haya pedido mientras renderizábamos.
            if (pendingScale !== null && pendingScale !== scale) {
                scale = pendingScale;
                pendingScale = null;
                renderAll();
            } else {
                pendingScale = null;
            }
        }).catch(function (err) {
            rendering = false;
            fallback(err);
        });
    }

    function applyScale(next) {
        next = clamp(next);
        if (rendering) {
            pendingScale = next;
            setLabel(next);
            return;
        }
        scale = next;
        renderAll();
    }

    function currentTarget() {
        return pendingScale !== null ? pendingScale : scale;
    }

    pdfjsLib.getDocument(url).promise.then(function (pdf) {
        var jobs = [];
        for (var i = 1; i <= pdf.numPages; i++) jobs.push(pdf.getPage(i));
        return Promise.all(jobs);
    }).then(function (loaded) {
        if (status) status.remove();

        baseWidth = loaded[0].getViewport({ scale: 1 }).width;

        loaded.forEach(function (page) {
            var placeholder = document.createElement('canvas');
            stage.appendChild(placeholder);
            entries.push({ page: page, canvas: placeholder });
        });

        fitScale = computeFit();
        scale = fitScale;
        renderAll();

        btnIn.addEventListener('click', function () { applyScale(currentTarget() * 1.25); });
        btnOut.addEventListener('click', function () { applyScale(currentTarget() / 1.25); });
        btnFit.addEventListener('click', function () {
            fitScale = computeFit();
            applyScale(fitScale);
        });

        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                // Mantenemos el nivel de zoom relativo que eligió la persona.
                var ratio = currentTarget() / fitScale;
                fitScale = computeFit();
                applyScale(fitScale * ratio);
            }, 200);
        });
    }).catch(function (err) {
        if (status) status.remove();
        fallback(err);
    });
})();
</script>
@endpush
