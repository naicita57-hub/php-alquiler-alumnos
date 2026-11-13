<?php 
require_once("../../clases/Carrera.php");
require_once("../../clases/Conexion.php");

$nombre = new Carrera;

$lista = $nombre->todasCarreras();
?>
<h2>Administración de Carreras</h2>
<table class="table table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Carrera</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>

<?php
foreach ($lista as $carrera) {
    ?>
    <tr>
      <td><?= $carrera->getIdCarrera();?></td>
      <td><?= $carrera->getNombreCarrera();?></td>
      <td>
        <a href="?p=editar_carrera&id=<?= $carrera->getIdCarrera();?>" class="btn btn-warning">Editar</a>
        <a href="?p=borrar_carrera&id=<?= $carrera->getIdCarrera();?>" class="btn btn-danger">Borrar</a>
    </td>
    </tr> 
    <?php   
}
?>
</tbody>
</table>

<a href="?p=crear_carrera" class="btn btn-primary">Crear carrera</a>
