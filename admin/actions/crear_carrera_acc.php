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
}catch (Exception $e){
    die("No se pudo cargar la carrera.");
}

header('Location: ../index.php?p=carreras');

?>