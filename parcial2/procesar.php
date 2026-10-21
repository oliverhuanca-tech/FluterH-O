<?php

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$pedido = $_POST["pedido"];

echo "<h2>Pedido recibido en Salteneria El Horno</h2>";

echo "<p>Nombre: $nombre</p>";
echo "<p>Correo: $correo</p>";
echo "<p>Pedido: $pedido</p>";

$carta = [
  "Saltena de pollo - Bs 6",
  "Docena de saltenas - Bs 65",
  "Refresco de mocochinchi - Bs 5"
];

echo "<h3>Carta</h3>";

foreach ($carta as $item) {
  echo "<p>$item</p>";
}

echo "<p>Te atiende Oliver Oscar Huanca Mamani</p>";

?>