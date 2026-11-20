<?php

$id = $_GET['id'] ?? FALSE;
$carrera = Carrera::get_x_id($id);


?>
<h2>Editar Ccategoria</h2>
<div class="row">
    <div class="col-12">
        <h3>Nombre de categoria</h3>
        <p><?= $categoria->getNombreCategoria(); ?></p>
    </div>
    <div class="col-12">
        <a href="actions/borrar_categoria_acc.php?id=<?= $categoria->getIdCategoria(); ?>" class="btn btn-danger">Eliminar</a>
        <a href="?p=categorias" class="btn btn-primary">Cancelar</a>
    </div>
</div>