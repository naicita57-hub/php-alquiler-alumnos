<?php
require_once __DIR__ . '/../../functions/autoload.php';
$id = $_GET['id'] ?? FALSE;


try{
    $carrera = Carrera::get_x_id($id);

    echo "<pre>";
    print_r($carrera);
    echo "</pre>";

    $carrera->delete();
    Alerta::add_alerta('success', 'Carrera borrada correctamente.');

}catch (Exception $e){
    Alerta::add_alerta('warning', 'No se pudo borrar la carrera.');

}

header('Location: ../index.php?p=carreras');

?>

