<!-- examen -->
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pasteleria La Espiga</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

  <header>
    <h1>Pasteleria La Espiga</h1>
    <p>Pastelería de barrio</p>

    <button type="button" id="btn-tema">🌙 Modo oscuro</button>

    <nav>
      <button type="button" id="btn-menu" class="hamburguesa">☰ Menú</button>

      <ul>
        <li><a href="/tortas">Tortas</a></li>
        <li><a href="/tortas/nuevo">Registrar torta</a></li>
      </ul>
    </nav>
  </header>

  <main>
    @yield('contenido')
  </main>

  <footer>
    <p>Integradora - Oliver Oscar Huanca Mamani - 27 de octubre de 2026</p>
  </footer>

  <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>