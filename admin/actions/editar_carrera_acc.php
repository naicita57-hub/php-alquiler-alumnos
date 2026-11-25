<?php
require_once ("../../functions/autoload.php");

$postData = $_POST;
$nombre = Carrera::get_x_id($postData["id"]);

echo "<pre>";
print_r($postData);
echo "</pre>";

echo "<pre>";
print_r($nombre);
echo "</pre>";

$postData["id"]  ;
$postData["nombre"];
try{
    $nombre->edit($postData["nombre"]);
     Alerta::add_alerta('success', 'Cambios en la carrera guardados correctamente.');
}catch (Exception $e){
      Alerta::add_alerta('warning', 'No se pudo guardar los cambios.');

}
header('Location: ../index.php?p=carreras');
?>