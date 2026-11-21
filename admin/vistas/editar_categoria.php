<?php


$id = $_GET['id'] ?? FALSE;
$nombre = Categoria::get_x_id($id);

if(!is_null($nombre)){
?>
<h2>Editar categoría</h2>
<form action="actions/editar_categoria_acc.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" class="form-control" id="id" value="<?= $nombre->getIdCategoria(); ?>" >
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de categoría</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $nombre->getNombreCategoria(); ?>">
    </div>
    <input type="submit"  class="btn btn-warning" value="Editar">
    <a href="?p=categoria" class="btn btn-danger">Cancelar</a>
</form>
<?php 
}else{
    ?>
    <h1>No encontramos la Categoría para editar</h1>
    <p>Volver a <a href="?p=categorias">editar Categoría</a></p>
    <?php
}
?>