<?php
require_once("../../functions/autoload.php");

$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";

try{
    Consulta::insert(
        $postData['nombre'], 
        $postData['apellido'], 
        $postData['email'],
        $postData['telefono'],
        !empty($postData['id_producto']) ? (int) $postData['id_producto'] : null,
        (int) $postData['id_motivo'],
        $postData['comentario']
    );
}catch (Exception $e){
    echo "<h1>Error en la base de datos:</h1>"; 
    echo "<pre>" . $e->getMessage() . "</pre>";
}

header('Location: ../index.php?p=contacto&status=ok');
exit();
?>