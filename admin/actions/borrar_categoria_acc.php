<?php
require_once ("../../functions/autoload.php");
$id = $_GET['id'] ?? FALSE;


try{
    $categoria = Categoria::get_x_id($id);
    $categoria->delete();
    Alerta::add_alerta('success', 'Categoria borrada correctamente.');

}catch (Exception $e){
    Alerta::add_alerta('warning', 'No se pudo borrar la categoria.');

}

header('Location: ../index.php?p=categorias');

?>