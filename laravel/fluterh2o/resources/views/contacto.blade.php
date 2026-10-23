@extends('layouts.base')

@section('contenido')

<section id="contacto">

  <h2>Contacto</h2>

  <address>
    Teléfono: 73265463<br>
    Correo: flutterh2o.HM@gmail.com<br>
    Bolivia
  </address>

  <h3>Envíanos tu consulta</h3>

  <form
    id="form-contacto"
    novalidate
    method="POST"
    action="{{ route('contacto.enviar') }}"
  >

    @csrf

    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" required>
    <br><br>

    <label for="correo">Correo:</label><br>
    <input type="email" id="correo" name="correo" required>
    <br><br>

    <label for="celular">Celular:</label><br>
    <input
      type="tel"
      id="celular"
      name="celular"
      required
      maxlength="8"
    >
    <br><br>

    <label for="asunto">Motivo de la consulta:</label><br>

    <select id="asunto" name="asunto" required>
      <option value="">Seleccione una opción</option>
      <option value="informacion">Solicitar información</option>
      <option value="riego">Consulta sobre el sistema de riego</option>
      <option value="instalacion">Consulta sobre instalación</option>
      <option value="soporte">Soporte técnico</option>
      <option value="otro">Otra consulta</option>
    </select>

    <br><br>

    <label for="mensaje">Mensaje:</label><br>

    <textarea
      id="mensaje"
      name="mensaje"
      rows="5"
      cols="40"
      required
    ></textarea>

    <br><br>

    <button type="submit">Enviar consulta</button>

    <p id="aviso-contacto" class="aviso"></p>

  </form>

</section>

@endsection