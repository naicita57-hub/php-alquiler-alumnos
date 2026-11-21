<?php
require_once __DIR__ . '/../../functions/autoload.php';
$id = $_GET['id'] ?? FALSE;
echo "<pre>";
print_r($id);
echo "</pre>";

try{
    $carrera = Carrera::get_x_id($id);

    echo "<pre>";
    print_r($carrera);
    echo "</pre>";

    $carrera->delete();
}catch (Exception $e){
    die("No se pudo borrar la carrera.");
}

header('Location: ../index.php?p=carreras');

?>

