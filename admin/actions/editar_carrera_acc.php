<?php
require_once("../../clases/Carrera.php");

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
}catch (Exception $e){
    //Vamos a modificar en el futuro este hermoso die
    die("No se pudo editar la marca");
}
header('Location: ../index.php?sec=carreras');
?>