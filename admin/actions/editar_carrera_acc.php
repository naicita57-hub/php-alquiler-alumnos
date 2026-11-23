<?php
require_once __DIR__ . '/../../functions/autoload.php';

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
//El Objeto Carrera $carrera tiene metodos propios
try{
    $nombre->edit($postData["nombre"]);
     Alerta::add_alerta('success', 'Cambios en la carrera guardados correctamente.');
}catch (Exception $e){
    //Vamos a modificar en el futuro este hermoso die
      Alerta::add_alerta('warning', 'No se pudo guardar los cambios.');

}
header('Location: ../index.php?p=carreras');
?>