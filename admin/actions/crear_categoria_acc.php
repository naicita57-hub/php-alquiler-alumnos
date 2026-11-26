<?php
require_once("../../functions/autoload.php");

$postData = $_POST;


try{
    Categoria::insert(
        $postData['categoria']
    );
     Alerta::add_alerta('success', 'Categoria creada correctamente.');
}catch (Exception $e){
     Alerta::add_alerta('warning', 'No se pudo crear la categoría .');
}

header('Location: ../index.php?p=categorias');

?>