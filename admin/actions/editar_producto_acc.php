<?php
require_once ("../../functions/autoload.php");

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];


try{
    $producto = Producto::get_x_id($postData['id']);
    

    if(!empty($datosArchivo['tmp_name'])){
        Imagen::borrarImagen("../../assets/imagenes/" . $producto->getImagen());
        $imagen = Imagen::subirImagen("../../assets/imagenes/", $datosArchivo);
    }else{
        $imagen = $postData['imagen_og'];
    }
$producto->edit(
    $postData['nombre'],
    $postData['descripcion'],
    (int) $postData['precio'],
    (int) ($postData['stock'] ?? $producto->getStock()),
    $postData['fecha_ingreso'] ?? $producto->getFechaIngreso(),
    $imagen
);
Alerta::add_alerta('success', 'Producto editado correctamente.');

}catch (Exception $e){
    Alerta::add_alerta('warning', 'No se pudieron guardar los cambios.');
}

header('Location: ../index.php?p=productos');

?>