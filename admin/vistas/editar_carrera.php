<?php
require_once("../../clases/Carrera.php");
require_once("../../clases/Conexion.php");

$id = $_GET['id'] ?? FALSE;
$nombre = Carrera::get_x_id($id);

if(!is_null($nombre)){
?>
<h2>Editar carrera</h2>
<form action="actions/editar_carrera_acc.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" class="form-control" id="id" value="<?= $nombre->getIdCarrera(); ?>" >
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de carrera</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre->getNombreCarrera(); ?>">
    </div>
    <input type="submit"  class="btn btn-warning" value="Editar">
    <a href="?sec=carrera" class="btn btn-danger">Cancelar</a>
</form>
<?php 
}else{
    ?>
    <h1>No encontramos la Carrera para editar</h1>
    <p>Volver a <a href="?sec=carreras">editar Carrera</a></p>
    <?php
}
?>