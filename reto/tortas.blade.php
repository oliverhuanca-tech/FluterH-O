<!-- examen -->

@extends('layouts.espiga')

@section('contenido')

<section>
    <h2>Vitrina de tortas</h2>

```
<p>
    Pastelería La Espiga ofrece tortas preparadas para diferentes gustos
    y ocasiones, con variedad de sabores y precios.
</p>

<p>Hay {{ count($tortas) }} tortas en la vitrina.</p>

@foreach ($tortas as $torta)
    <p>
        Sabor: {{ $torta->sabor }} -
        Precio: Bs {{ $torta->precio }} -
        Stock: {{ $torta->stock }}
    </p>
@endforeach

<p>Vitrina atendida por Oliver Oscar Huanca Mamani</p>

<a href="/tortas/nuevo">Registrar nueva torta</a>
```

</section>

@endsection
