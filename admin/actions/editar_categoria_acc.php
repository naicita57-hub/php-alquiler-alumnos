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
     Alerta::add_alerta('success', 'Categoria guardada correctamente.');
}catch (Exception $e){
    //Vamos a modificar en el futuro este hermoso die
     Alerta::add_alerta('success', 'No se pudo editar la categoría.');
}
header('Location: ../index.php?p=categorias');
?>