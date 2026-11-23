<?php
require_once __DIR__ . '/../../functions/autoload.php';
$id = $_GET['id'] ?? FALSE;
echo "<pre>";
print_r($id);
echo "</pre>";

try{
    $categoria = Categoria::get_x_id($id);

    echo "<pre>";
    print_r($categoria);
    echo "</pre>";

    $categoria->delete();
     Alerta::add_alerta('success', 'Categoria eliminada correctamente.');
}catch (Exception $e){
    Alerta::add_alerta('warning', 'No se pudo eliminar la categoría.');
}

header('Location: ../index.php?p=categorias');

?>