@extends('layouts.base')

@section('contenido')

<section id="galeria">
  <h2>Galería</h2>

  <figure>
    <img
      src="{{ asset('img/inicios.jpeg') }}"
      alt="Prototipo inicial"
      width="500"
    >
    <figcaption>Prototipo inicial de FlutterH2O</figcaption>
  </figure>

  <figure>
    <img
      src="{{ asset('img/kit.jpeg') }}"
      alt="Kit FlutterH2O"
      width="500"
    >
    <figcaption>Kit del sistema FlutterH2O</figcaption>
  </figure>
</section>

@endsection