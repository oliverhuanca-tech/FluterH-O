<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlutterH2O</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

  <header>
    <h1>FlutterH2O</h1>
    <p>Sistema de riego urbano inteligente</p>

    <button type="button" id="btn-tema">🌙 Modo oscuro</button>

    <nav>
      <button type="button" id="btn-menu" class="hamburguesa">☰ Menú</button>

      <ul>
        <li><a href="{{ route('inicio') }}">Inicio</a></li>
        <li><a href="{{ route('nosotros') }}">Nosotros</a></li>
        <li><a href="{{ route('sistema') }}">Sistema</a></li>
        <li><a href="{{ route('galeria') }}">Galería</a></li>
        <li><a href="{{ route('soporte') }}">Soporte</a></li>
        <li><a href="{{ route('blog') }}">Blog</a></li>
        <li><a href="{{ route('contacto') }}">Contacto</a></li>
        <li><a href="{{ route('ubicacion') }}">Ubicación</a></li>
      </ul>
    </nav>
  </header>

  <main>
    @yield('contenido')
  </main>

  <footer>
    <p>© 2026 FlutterH2O - Todos los derechos reservados.</p>
    <p>Oliver Oscar Huanca Mamani - La Paz, Bolivia</p>
  </footer>

  <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>