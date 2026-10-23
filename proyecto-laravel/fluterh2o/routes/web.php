<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/sistema', function () {
    return view('sistema');
})->name('sistema');

Route::get('/galeria', function () {
    return view('galeria');
})->name('galeria');

Route::get('/soporte', function () {
    return view('soporte');
})->name('soporte');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/ubicacion', function () {
    return view('ubicacion');
})->name('ubicacion');


Route::post('/contacto', function () {

    $nombre = request('nombre');
    $correo = request('correo');
    $celular = request('celular');
    $asunto = request('asunto');
    $mensaje = request('mensaje');

    return "
        <h2>Consulta recibida</h2>
        <p>Nombre: $nombre</p>
        <p>Correo: $correo</p>
        <p>Celular: $celular</p>
        <p>Motivo: $asunto</p>
        <p>Mensaje: $mensaje</p>
    ";

})->name('contacto.enviar');

