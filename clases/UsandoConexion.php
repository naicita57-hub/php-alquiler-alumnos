<?php
require_once "Conexion.php";
require_once "Producto.php";

$resultado = Producto::catalogo_completo();

foreach ($resultado as $producto) {
    echo '<div style="border:1px solid black;">';
    echo "<p>id: " . $producto->getId() . "</p>";
    echo "<p>Nombre: " . $producto->getNombre() . "</p>";
    echo "<p>Descripcion: " . $producto->getDescripcion() . "</p>";
    echo "<p>Precio: $" . $producto->getPrecio() . "</p>";
    echo "<p>Fecha de ingreso:" . $producto->getFechaIngreso() . "</p>";
}
