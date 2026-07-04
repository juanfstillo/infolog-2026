<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/la-empresa', [PageController::class, 'laEmpresa'])->name('la-empresa');
Route::get('/nuestro-cliente', [PageController::class, 'nuestroCliente'])->name('nuestro-cliente');
Route::get('/conocenos', [PageController::class, 'conocenos'])->name('conocenos');
Route::get('/politica-calidad', [PageController::class, 'politicaCalidad'])->name('politica-calidad');
Route::get('/prensa', [PageController::class, 'prensa'])->name('prensa');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/servicios/{slug}', [ServicioController::class, 'show'])->name('servicios.show');
