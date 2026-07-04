<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'stats' => config('site.stats'),
            'roadmap' => config('site.roadmap'),
            'servicios' => config('site.servicios'),
            'press' => collect(config('site.press'))->first(),
        ]);
    }

    public function laEmpresa(): View
    {
        return view('pages.la-empresa', [
            'stats' => config('site.stats'),
            'roadmap' => config('site.roadmap'),
            'servicios' => config('site.servicios'),
        ]);
    }

    public function nuestroCliente(): View
    {
        return view('pages.nuestro-cliente');
    }

    public function conocenos(): View
    {
        return view('pages.conocenos');
    }

    public function politicaCalidad(): View
    {
        return view('pages.politica-calidad');
    }

    public function prensa(): View
    {
        return view('pages.prensa', [
            'press' => config('site.press'),
        ]);
    }

    public function contacto(): View
    {
        return view('pages.contacto');
    }
}
