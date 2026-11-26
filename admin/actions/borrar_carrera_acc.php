<?php
require_once ("../../functions/autoload.php");
$id = $_GET['id'] ?? FALSE;

try{
    $carrera = carrera::get_x_id($id);

    $carrera->delete();
    Imagen::borrarImagen("../../assets/imagenes/" . $carrera->getImagenCarrera());
     Alerta::add_alerta('success', 'Carrera eliminada correctamente.');
}catch (Exception $e){
    Alerta::add_alerta('warning', 'No se pudo eliminar la carrera.');
}

header('Location: ../index.php?p=carreras');

?>