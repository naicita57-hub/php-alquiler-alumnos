<?php
require_once("../functions/autoload.php");

$postData = $_POST;
$datosArchivo = $_FILES['foto'];

echo "<pre>";
print_r($postData);
echo "</pre>";

echo "<pre>";
print_r($datosArchivo);
echo "</pre>";
try{
 $imagen = Imagen::subirImagen("../../assets/imagenes/productos", $datosArchivo);
    $idProducto = Producto::insert(
        $postData['id'], 
        $postData['nombre'], 
        $postData['imagen'],
        $postData['precio'],
        $imagen
    );
}catch (Exception $e){
    die("No se pudo cargar el producto .");
}

header('Location: ../index.php?p=productos');

?>