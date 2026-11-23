<?php
require_once __DIR__ . '/../../functions/autoload.php';

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];


try{
    $producto = Producto::get_x_id($postData['id']);
    

    if(!empty($datosArchivo['tmp_name'])){
        //El usuario decidió reemplazar la imágen

        //borramos la foto anterior.
        Imagen::borrarImagen("../../assets/imagenes/" . $producto->getFoto());
        //actualizamos por la nueva foto.
        $imagen = Imagen::subirImagen("../../assets/imagenes/", $datosArchivo);
    }else{
        //El usuario decidió quedarse con la foto original
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