<?php
require_once("../../functions/autoload.php");

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];
try {
    $producto = Producto::get_x_id((int) $postData['id']);

    if (!$producto) {
        throw new Exception("Producto no encontrado");
    }

    if (!empty($datosArchivo['tmp_name'])) {
        Imagen::borrarImagen("../../assets/imagenes/" . $producto->getImagen());
        $imagen = Imagen::subirImagen("../../assets/imagenes", $datosArchivo);
    } else {
        $imagen = $postData['imagen_og'];
    }

    $producto->edit(
        $postData['nombre'],
        $postData['descripcion'],
        $postData['precio'],
        $postData['stock'],
        $postData['fecha_ingreso'],
        $imagen
    );
} catch (Exception $e) {
    die("No se pudo editar el producto.");
}

header('Location: ../index.php?p=productos');