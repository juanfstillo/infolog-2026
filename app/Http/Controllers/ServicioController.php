<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ServicioController extends Controller
{
    public function index(): View
    {
        return view('pages.servicios.index', [
            'servicios' => config('site.servicios'),
        ]);
    }

    public function show(string $slug): View
    {
        $servicios = config('site.servicios');

        abort_unless(array_key_exists($slug, $servicios), Response::HTTP_NOT_FOUND);

        return view('pages.servicios.show', [
            'slug' => $slug,
            'servicio' => $servicios[$slug],
            'otrosServicios' => collect($servicios)->except($slug),
        ]);
    }
}
