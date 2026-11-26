<?php
require_once("../../functions/autoload.php");

$postData = $_POST;
$datosArchivo = $_FILES['imagen'] ?? null;
try{
        $imagen = null;

    if (!empty($datosArchivo['tmp_name'])) {
        $imagen = Imagen::subirImagen(
            __DIR__ . "/../../assets/imagenes",
            $datosArchivo
        );
    }
    Carrera::insert(
        $postData['carrera'],
        $imagen
    );
     Alerta::add_alerta('success', 'Carrera guardada correctamente.');
}catch (Exception $e){
     Alerta::add_alerta('warning', 'No se pudo guardar la carrera.');
}

header('Location: ../index.php?p=carreras');

?>