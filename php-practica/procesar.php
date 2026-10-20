<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$celular = $_POST["celular"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

echo "<h2>Consulta recibida</h2>";
echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Celular: $celular</p>";
echo "<p>Motivo: $asunto</p>";
echo "<p>Mensaje: $mensaje</p>";
?>


