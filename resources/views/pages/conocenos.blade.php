@extends('layouts.app')

@section('title', 'Conocenos')
@section('description', 'Conocé INFOLOG SRL: el equipo y un recorrido audiovisual por el Archivo Técnico Avellaneda.')

@php
    $video = config('site.video.institucional');
@endphp

@section('content')

    {{-- TÍTULO --}}
    <section class="bg-navy-950 text-white">
        <div class="wrap py-20 text-center">
            <span class="eyebrow eyebrow-on-dark">Conocenos</span>
            <h1 class="mt-3 text-3xl sm:text-4xl lg:text-5xl">Conocé INFOLOG SRL</h1>
            <p class="mt-5 mx-auto max-w-[58ch] text-lg text-[#d7dee4] leading-relaxed">
                Detrás del archivo de exploración petrolífera más importante de América del Sur hay un equipo
                que lo sostiene todos los días.
            </p>
        </div>
    </section>

    {{-- FOTOGRAFÍA INSTITUCIONAL --}}
    <section class="bg-navy-950 pb-16">
        <div class="wrap">
            <figure class="mx-auto max-w-[1000px] m-0">
                <img
                    src="/images/infolog-conocenos-1800.jpg"
                    srcset="/images/infolog-conocenos-900.jpg 900w, /images/infolog-conocenos-1800.jpg 1800w"
                    sizes="(max-width: 1040px) 100vw, 1000px"
                    width="1800" height="1012"
                    alt="El equipo de trabajo de Infolog S.R.L. en el Archivo Técnico Avellaneda"
                    class="w-full rounded border border-white/15"
                >
                <figcaption class="mt-3 text-center text-sm text-[#9fb0bd]">
                    El equipo de Infolog S.R.L. en el Archivo Técnico Avellaneda.
                </figcaption>
            </figure>
        </div>
    </section>

    {{-- VIDEO INSTITUCIONAL --}}
    <section class="bg-navy-900 border-t border-white/10">
        <div class="wrap section">
            <div class="mx-auto max-w-[1000px]">
                <div class="mb-8 text-center">
                    <span class="eyebrow eyebrow-on-dark">Video institucional</span>
                    <h2 class="mt-3 text-2xl sm:text-3xl text-white">Un recorrido por el Archivo Técnico Avellaneda</h2>
                </div>

                <div
                    id="video-institucional"
                    class="video-frame"
                    data-youtube-id="{{ $video['youtube_id'] }}"
                >
                    <div id="video-institucional-player"></div>

                    <button type="button" id="video-unmute" class="video-unmute" hidden>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                            <path d="M4 9v6h4l5 4V5L8 9H4z" stroke-linejoin="round"/>
                            <path d="M17 9.5a3.5 3.5 0 010 5M19.5 7a7 7 0 010 10" stroke-linecap="round"/>
                        </svg>
                        <span>Activar sonido</span>
                    </button>
                </div>

                <p class="mt-4 text-center text-sm text-[#9fb0bd]">
                    El video comienza silenciado al entrar en pantalla. Tocá <strong class="font-semibold text-white">Activar sonido</strong> para escucharlo.
                </p>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function () {
    var frame = document.getElementById('video-institucional');
    if (!frame) return;

    var unmuteBtn = document.getElementById('video-unmute');
    var videoId = frame.dataset.youtubeId;
    var player = null;

    // userPaused: la persona pausó a mano => no reanudamos al volver a entrar en pantalla.
    // programmaticPause: pausa nuestra al salir del viewport; el evento PAUSED que
    // dispara llega de forma asíncrona, así que hay que marcarlo antes de pausar.
    var userPaused = false;
    var programmaticPause = false;

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function isActive() {
        if (!player || !player.getPlayerState) return false;
        var s = player.getPlayerState();
        return s === YT.PlayerState.PLAYING || s === YT.PlayerState.BUFFERING;
    }

    function syncUnmuteButton() {
        if (!player || !player.isMuted) return;
        unmuteBtn.hidden = !player.isMuted();
    }

    function onReady() {
        // La calidad efectiva la decide YouTube según el tamaño del reproductor
        // (aquí ~1000px de ancho => 720p); esto sólo refuerza la preferencia.
        if (player.setPlaybackQuality) player.setPlaybackQuality('hd720');

        syncUnmuteButton();
        observe();
    }

    function onStateChange(event) {
        if (event.data === YT.PlayerState.PAUSED) {
            if (programmaticPause) {
                programmaticPause = false;
            } else {
                userPaused = true;
            }
        } else if (event.data === YT.PlayerState.PLAYING) {
            userPaused = false;
            programmaticPause = false;
        }
        syncUnmuteButton();
    }

    function observe() {
        if (!('IntersectionObserver' in window)) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!player || !player.playVideo) return;

                if (entry.isIntersecting && entry.intersectionRatio >= 0.5) {
                    // Autoplay al entrar en el campo visual, siempre silenciado.
                    if (!userPaused && !reducedMotion) player.playVideo();
                } else if (isActive()) {
                    programmaticPause = true;
                    player.pauseVideo();
                }
            });
        }, { threshold: [0, 0.5] });

        observer.observe(frame);
    }

    unmuteBtn.addEventListener('click', function () {
        if (!player || !player.unMute) return;
        player.unMute();
        player.setVolume(100);
        userPaused = false;
        player.playVideo();
        unmuteBtn.hidden = true;
    });

    // Si la persona vuelve a silenciar con los controles nativos, reaparece el botón.
    setInterval(syncUnmuteButton, 1000);

    window.onYouTubeIframeAPIReady = function () {
        player = new YT.Player('video-institucional-player', {
            videoId: videoId,
            host: 'https://www.youtube-nocookie.com',
            playerVars: {
                mute: 1,
                controls: 1,
                rel: 0,
                modestbranding: 1,
                playsinline: 1,
                vq: 'hd720',
                origin: window.location.origin,
            },
            events: {
                onReady: onReady,
                onStateChange: onStateChange,
            },
        });
    };

    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
    document.head.appendChild(tag);
})();
</script>
@endpush
