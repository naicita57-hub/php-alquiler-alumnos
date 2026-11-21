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
// Debemos rescatar el archivo que está en la carpeta temporal del servido.
// 1. Obtener la extensión del archivo original.
// 2. Obtener el nombre del archivo o crear uno nuevo.
// 3. Usar PHP para mover el archivo temporal a su nueva ubicación y utilizando los valores adquiridos en los primeros dos pasos.
// 4. Guardar el nuevo nombre (y extensión) en una variable para subsecuentemente insertarlo en la BBDD.

// $nombreOriginal = (explode(".", $datosArchivo['name']));
// $extension = end($nombreOriginal);
// $nombreNuevo = time() . ".$extension";

// $archivoSubido = move_uploaded_file($datosArchivo['tmp_name'], "../../img/productos/$nombreNuevo");

// if($archivoSubido){
//     $foto = $nombreNuevo;
//     var_dump($foto);
// }else{
//     die("No se pudo subir la foto");
// }

//Creamos una clase Imagen y luego la instanciamos dentro del try catch


try{
 $imagen = Imagen::subirImagen("../../img/productos", $datosArchivo);
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

header('Location: ../index.php?sec=productos');

?>