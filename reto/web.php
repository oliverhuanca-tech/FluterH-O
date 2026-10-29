<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Torta;
use App\Models\Riego;
use App\Models\Consulta;
use App\Models\User;

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

    request()->validate([
        'nombre' => 'required',
        'correo' => 'required|email',
        'celular' => 'required',
        'asunto' => 'required',
        'mensaje' => 'required',
    ]);

    Consulta::create([
        'nombre' => request()->input('nombre'),
        'correo' => request()->input('correo'),
        'celular' => request()->input('celular'),
        'asunto' => request()->input('asunto'),
        'mensaje' => request()->input('mensaje'),
    ]);

    return redirect('/contacto')->with('exito', 'Consulta enviada correctamente.');

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

    $riegos = Riego::all();

    return view('panel', ['riegos' => $riegos]);

})->middleware('auth')->name('panel');

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/inicio');

})->name('logout');

Route::get('/riego/nuevo', function () {
    return view('riego-nuevo');
})->middleware('auth');


Route::post('/riego/nuevo', function () {

    request()->validate([
        'zona' => 'required',
        'humedad' => 'required|integer',
        'agua' => 'required|integer',
    ], [
        'zona.required' => 'Indica la zona de riego.',
        'humedad.required' => 'Indica la humedad.',
        'humedad.integer' => 'La humedad debe ser un numero entero.',
        'agua.required' => 'Indica la cantidad de agua.',
        'agua.integer' => 'La cantidad de agua debe ser un numero entero.',
    ]);

    Riego::create([
        'zona' => request()->input('zona'),
        'humedad' => request()->input('humedad'),
        'agua' => request()->input('agua'),
    ]);

    return redirect('/panel');

})->middleware('auth');


Route::get('/riegos', function () {

    $riegos = Riego::all();

    return view('riegos', ['riegos' => $riegos]);

})->middleware('auth');

Route::get('/riegos/{id}/editar', function ($id) {

    $riego = Riego::findOrFail($id);

    return view('riego-editar', ['riego' => $riego]);

})->middleware('auth');

Route::post('/riegos/{id}/editar', function ($id) {

    request()->validate([
        'zona' => 'required',
        'humedad' => 'required|integer',
        'agua' => 'required|integer',
    ], [
        'zona.required' => 'Indica la zona de riego.',
        'humedad.required' => 'Indica la humedad.',
        'humedad.integer' => 'La humedad debe ser un numero entero.',
        'agua.required' => 'Indica la cantidad de agua.',
        'agua.integer' => 'La cantidad de agua debe ser un numero entero.',
    ]);

    $riego = Riego::findOrFail($id);

    $riego->update([
        'zona' => request()->input('zona'),
        'humedad' => request()->input('humedad'),
        'agua' => request()->input('agua'),
    ]);

    return redirect('/riegos');

})->middleware('auth');

Route::post('/riegos/{id}/eliminar', function ($id) {

    $riego = Riego::findOrFail($id);

    $riego->delete();

    return redirect('/riegos');

})->middleware('auth');


Route::get('/consultas', function () {

    $consultas = Consulta::all();

    return view('consultas', ['consultas' => $consultas]);

})->middleware('auth');

Route::post('/consultas/{id}/eliminar', function ($id) {

    $consulta = Consulta::findOrFail($id);

    $consulta->delete();

    return redirect('/consultas');

})->middleware('auth');

Route::get('/usuarios', function () {

    $usuarios = User::all();

    return view('usuarios', ['usuarios' => $usuarios]);

})->middleware('auth');

Route::get('/usuarios/nuevo', function () {
    return view('usuario-nuevo');
})->middleware('auth');

Route::post('/usuarios/nuevo', function () {

    request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
    ], [
        'name.required' => 'Indica el nombre del usuario.',
        'email.required' => 'Indica el correo.',
        'email.email' => 'El correo no es valido.',
        'email.unique' => 'Ese correo ya esta registrado.',
        'password.required' => 'Indica una contraseña.',
    ]);

    User::create([
        'name' => request()->input('name'),
        'email' => request()->input('email'),
        'password' => request()->input('password'),
    ]);

    return redirect('/usuarios');

})->middleware('auth');
Route::get('/usuarios/{id}/editar', function ($id) {

    $usuario = User::findOrFail($id);

    return view('usuario-editar', ['usuario' => $usuario]);

})->middleware('auth');

Route::post('/usuarios/{id}/editar', function ($id) {

    request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
    ], [
        'name.required' => 'Indica el nombre del usuario.',
        'email.required' => 'Indica el correo.',
        'email.email' => 'El correo no es valido.',
        'email.unique' => 'Ese correo ya esta registrado.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
    ]);

    $usuario = User::findOrFail($id);

    $datos = [
        'name' => request()->input('name'),
        'email' => request()->input('email'),
    ];

    if (request()->filled('password')) {
        $datos['password'] = request()->input('password');
    }

    $usuario->update($datos);

    return redirect('/usuarios');

})->middleware('auth');

Route::post('/usuarios/{id}/eliminar', function ($id) {

    $usuario = User::findOrFail($id);

    if ($usuario->email === 'oliver.huanca@uab.edu.bo') {
        return redirect('/usuarios');
    }

    $usuario->delete();

    return redirect('/usuarios');

})->middleware('auth');




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
        'stock' => 'required|integer',
    ], [
        'sabor.required' => 'Indica el sabor de la torta.',
        'precio.required' => 'Indica el precio de la torta.',
        'precio.integer' => 'El precio va en digitos, sin centavos.',
        'stock.required' => 'Indica la cantidad disponible en stock.',
        'stock.integer' => 'El stock debe ser un numero entero.',
    ]);

    Torta::create([
        'sabor' => request()->input('sabor'),
        'precio' => request()->input('precio'),
        'stock' => request()->input('stock'),
    ]);

    return redirect('/tortas');

});


