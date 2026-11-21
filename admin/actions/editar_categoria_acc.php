<?php
require_once __DIR__ . '/../../functions/autoload.php';

$postData = $_POST;
$nombre = Categoria::get_x_id($postData["id"]);

echo "<pre>";
print_r($postData);
echo "</pre>";

echo "<pre>";
print_r($nombre);
echo "</pre>";

$postData["id"]  ;
$postData["nombre"];
//El Objeto Categoria $categoria tiene metodos propios
try{
    $nombre->edit($postData["nombre"]);
}catch (Exception $e){
    //Vamos a modificar en el futuro este hermoso die
    die("No se pudo editar la categoria");
}
header('Location: ../index.php?p=categorias');
?>