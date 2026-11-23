<?php


require_once __DIR__ . '/../../functions/autoload.php';

$postData = $_POST;
$datosArchivo = $_FILES['foto'];

try {
    $imagen = Imagen::subirImagen(__DIR__ . "/../../assets/imagenes", $datosArchivo);

    $idProducto = Producto::insert(
        $postData['nombre'],
        $postData['descripcion'] ?? $postData['presentacion'] ?? '',
        (int) $postData['precio'],
        (int) ($postData['stock'] ?? 1),
        $postData['fecha_ingreso'] ?? date('Y-m-d'),
        $imagen
    );

    if (!empty($postData['categorias'])) {
        foreach ($postData['categorias'] as $idCategoria) {
            Producto::guardar_categoria($idProducto, (int) $idCategoria);
        }
    }

    if (!empty($postData['carreras'])) {
        foreach ($postData['carreras'] as $idCarrera) {
            Producto::add_carrera($idProducto, (int) $idCarrera);
        }
       
    }
    Alerta::add_alerta('success', 'Producto guardado correctamente.');


} catch (Exception $e) {
  Alerta::add_alerta('error', 'No se pudo cargar el producto.');
   

}



header('Location: ../index.php?p=productos');
exit;