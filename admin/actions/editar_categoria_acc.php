<?php
require_once ("../../functions/autoload.php");

$postData = $_POST;
$nombre = Categoria::get_x_id($postData["id"]);


$postData["id"]  ;
$postData["nombre"];

try{
    $nombre->edit($postData["nombre"]);
     Alerta::add_alerta('success', 'Categoria guardada correctamente.');
}catch (Exception $e){
    
     Alerta::add_alerta('success', 'No se pudo editar la categoría.');
}
header('Location: ../index.php?p=categorias');
?>