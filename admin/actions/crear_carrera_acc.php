<?php
require_once("../../functions/autoload.php");

$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";


try{
    Carrera::insert(
        $postData['carrera']
    );
     Alerta::add_alerta('success', 'Carrera guardada correctamente.');
}catch (Exception $e){
     Alerta::add_alerta('warning', 'No se pudo guardar la carrera.');
}

header('Location: ../index.php?p=carreras');

?>