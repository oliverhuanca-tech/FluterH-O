<!-- examen -->
@extends('layouts.espiga')

@section('contenido')

<section>
    <h2>Registrar torta</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/tortas/nuevo" method="POST">
        @csrf

        <label for="sabor">Sabor de la torta:</label>
        <input type="text" id="sabor" name="sabor">

        <label for="precio">Precio en Bs:</label>
        <input type="number" id="precio" name="precio">

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock">

        <button type="submit">Registrar torta</button>
    </form>
</section>

@endsection