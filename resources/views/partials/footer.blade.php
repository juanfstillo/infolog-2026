<footer class="bg-navy-950 text-[#93a3b0] border-t border-white/10">
    <div class="wrap py-14 grid grid-cols-1 sm:grid-cols-3 gap-10">
        <div>
            <h4 class="text-white text-sm uppercase tracking-wider font-semibold mb-3">Infolog Argentina</h4>
            <p class="text-sm leading-relaxed">
                Custodia, administración, modernización y seguridad del Archivo Técnico Avellaneda de YPF S.A.
                Miembro de CEPERA. Certificados ISO 9001.
            </p>
        </div>
        <div>
            <h4 class="text-white text-sm uppercase tracking-wider font-semibold mb-3">Contacto</h4>
            <p class="text-sm leading-relaxed">
                <a href="https://goo.gl/maps/RK9Gf2JY4i1VJ76i6" class="hover:text-white">{{ config('site.contact.address_short') }}</a><br>
                <a href="mailto:{{ config('site.contact.email') }}" class="hover:text-white">{{ config('site.contact.email') }}</a><br>
                <a href="{{ config('site.contact.phone_href') }}" class="hover:text-white">{{ config('site.contact.phone_display') }}</a>
            </p>
        </div>
        <div>
            <h4 class="text-white text-sm uppercase tracking-wider font-semibold mb-3">Enlaces</h4>
            <ul class="list-none m-0 p-0 text-sm leading-relaxed">
                @foreach (config('site.footer_links') as $link)
                    <li><a href="{{ route($link['route']) }}" class="hover:text-white">{{ $link['label'] }}</a></li>
                @endforeach
                <li><a href="{{ route('servicios.index') }}" class="hover:text-white">Servicios</a></li>
            </ul>
        </div>
    </div>
    <div class="border-t border-white/10 py-5 text-center text-xs text-[#6c7c89]">
        © {{ date('Y') }} Infolog S.R.L. — Todos los derechos reservados.
    </div>
</footer>
