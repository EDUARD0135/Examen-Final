<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactocontroller;
use App\Http\Controllers\eventocontroller;
use App\Http\Controllers\notacontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// CONTACTO
Route::get('/contacto',[contactocontroller::class, 'index'])->name('contacto.index');
Route::get('/contacto/nuevocontacto',[contactocontroller::class, 'create'])->name('contacto.create');
Route::get('/contacto/{id}',[contactocontroller::class, 'show'])->name('contacto.show');
Route::post('/contacto/nuevocontacto',[contactocontroller::class, 'store'])->name('contacto.guardar');
Route::put('/contacto/{id}/editar', [contactocontroller::class, 'update'])->name('contacto.update')->where('id','[0-9]+');
Route::get('/contacto/{id}/editar', [contactocontroller::class, 'edit'])-> name('contacto.edit');
Route::delete('/contacto/{id}/borrar', [contactoController::class, 'destroy'])->name('contacto.borrar')->where('id', '[0-9]+');

// EVENTO
Route::get('/evento',[eventocontroller::class, 'index'])->name('evento.index');
Route::get('/evento/nuevoevento',[eventocontroller::class, 'create'])->name('evento.create');
Route::get('/evento/{id}',[eventocontroller::class, 'show'])->name('evento.show');
Route::post('/evento/nuevoevento',[eventocontroller::class, 'store'])->name('evento.guardar');
Route::put('/evento/{id}/editar', [eventocontroller::class, 'update'])->name('evento.update')->where('id','[0-9]+');
Route::get('/evento/{id}/editar', [eventocontroller::class, 'edit'])-> name('evento.edit');
Route::delete('/evento/{id}/borrar', [eventocontroller::class, 'destroy'])->name('evento.borrar')->where('id', '[0-9]+');

// NOTA
Route::get('/nota',[notacontroller::class, 'index'])->name('nota.index');
Route::get('/nota/nuevanota',[notacontroller::class, 'create'])->name('nota.create');
Route::get('/nota/{id}',[notacontroller::class, 'show'])->name('nota.show');
Route::post('/nota/nuevanota',[notacontroller::class, 'store'])->name('nota.guardar');
Route::put('/nota/{id}/editar', [notacontroller::class, 'update'])->name('nota.update')->where('id','[0-9]+');
Route::get('/nota/{id}/editar', [notacontroller::class, 'edit'])-> name('nota.edit');
Route::delete('/nota/{id}/borrar', [notacontroller::class, 'destroy'])->name('nota.borrar')->where('id', '[0-9]+');
