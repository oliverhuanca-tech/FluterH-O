<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Torta;

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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {

    $credenciales = request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();

        return redirect('/panel');
    }

    return back()->with('error', 'Correo o contraseña incorrectos.');

})->name('login.procesar');

Route::get('/panel', function () {
    return view('panel');
})->middleware('auth')->name('panel');

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/inicio');

})->name('logout');



//examen

Route::get('/tortas', function () {

    $tortas = Torta::all();

    return view('tortas', ['tortas' => $tortas]);

});

Route::get('/tortas/nuevo', function () {

    return view('tortas-nuevo');

});

Route::post('/tortas/nuevo', function () {

    request()->validate([
        'sabor' => 'required',
        'precio' => 'required|integer',
    ], [
        'sabor.required' => 'Indica el sabor de la torta.',
        'precio.required' => 'Indica el precio de la torta.',
        'precio.integer' => 'El precio va en digitos, sin centavos.',
    ]);

    Torta::create([
        'sabor' => request()->input('sabor'),
        'precio' => request()->input('precio'),
    ]);

    return redirect('/tortas');

});