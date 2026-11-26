<?php
require_once ("../../functions/autoload.php");

$postData = $_POST;
$nombre = Categoria::get_x_id($postData["id"]);

$postData["id"]  ;
$postData["nombre"];
try{
    $nombre->edit($postData["nombre"]);
}catch (Exception $e){
    die("No se pudo editar la categoria");
}
header('Location: ../index.php?p=categorias');
?>