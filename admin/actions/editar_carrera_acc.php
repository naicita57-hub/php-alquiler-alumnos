<?php
require_once __DIR__ . '/../../functions/autoload.php';

$postData = $_POST;
$datosArchivo = $_FILES['imagen'] ?? null; 
try {
    
    $carrera = Carrera::get_x_id($postData['id']);

    
    if (!empty($datosArchivo['tmp_name'])) {
       
        if ($carrera->getImagenCarrera()) {
            Imagen::borrarImagen("../../assets/imagenes/" . $carrera->getImagenCarrera());
        }
        
        $imagen = Imagen::subirImagen("../../assets/imagenes/", $datosArchivo);
    } else {
       
        $imagen = $postData['imagen_og'] ?? $carrera->getImagenCarrera();
    }

    $carrera->edit(
        $postData['nombre'],
        $imagen
    );

    Alerta::add_alerta('success', 'Cambios en la carrera guardados correctamente.');

} catch (Exception $e) {
    Alerta::add_alerta('warning', 'No se pudieron guardar los cambios.');
}

header('Location: ../index.php?p=carreras');
exit;