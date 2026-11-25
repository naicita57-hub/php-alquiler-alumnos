<?php
require_once("../../functions/autoload.php");

$id = $_GET['id'] ?? FALSE;

try{
    $producto = Producto::get_x_id($id);
    $producto->delete();
    Imagen::borrarImagen("../../assets/imagenes/" . $producto->getImagen());

Alerta::add_alerta('success', "El producto <strong>{$producto->getNombre()}</strong> fue borrado correctamente.");
} catch (Exception $e) {
    Alerta::add_alerta('danger', "No se pudo borrar el producto: " . $e->getMessage());
}

header('Location: ../index.php?p=productos');
?>