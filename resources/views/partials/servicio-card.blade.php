@php
    $fit = $servicio['image_fit'] ?? 'cover';
@endphp

<a href="{{ route('servicios.show', $slug) }}" class="group block border border-line rounded overflow-hidden bg-white hover:border-amber transition">
    <div class="aspect-[4/3] overflow-hidden bg-paper-tint {{ $fit === 'contain' ? 'bg-white p-6' : '' }}">
        <img
            src="{{ $servicio['image'] }}"
            alt="{{ $servicio['title'] }}"
            loading="lazy"
            class="w-full h-full {{ $fit === 'contain' ? 'object-contain' : 'object-cover group-hover:scale-[1.03]' }} transition duration-300"
        >
    </div>
    <div class="p-5">
        <{{ $heading ?? 'h3' }} class="text-base font-bold text-navy-950">{{ $servicio['title'] }}</{{ $heading ?? 'h3' }}>
        @if (! ($compact ?? false))
            <p class="mt-2 text-sm text-slate leading-relaxed">{{ $servicio['summary'] }}</p>
        @endif
        <span class="mt-3 inline-flex items-center gap-1 text-sm font-semibold text-amber-dark group-hover:text-amber">Conocé más →</span>
    </div>
</a>
