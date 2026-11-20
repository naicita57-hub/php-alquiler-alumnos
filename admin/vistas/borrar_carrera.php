<?php

$id = $_GET['id'] ?? FALSE;
$carrera = Carrera::get_x_id($id);


?>
<h2>Editar Carrera</h2>
<div class="row">
    <div class="col-12">
        <h3>Nombre de Carrera</h3>
        <p><?= $carrera->getNombreCarrera(); ?></p>
    </div>
    <div class="col-12">
        <a href="actions/borrar_carrera_acc.php?id=<?= $carrera->getIdCarrera(); ?>" class="btn btn-danger">Eliminar</a>
        <a href="?p=carreras" class="btn btn-primary">Cancelar</a>
    </div>
</div>