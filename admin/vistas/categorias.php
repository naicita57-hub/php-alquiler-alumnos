<?php 

$nombre = new Categoria;

$lista = $nombre->todasCategorias();
?>
<h2>Administración de Categorias</h2>
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
foreach ($lista as $categoria) {
    ?>
    <tr>
      <td><?= $categoria->getIdCategoria();?></td>
      <td><?= $categoria->getNombreCategoria();?></td>
      <td>
        <a href="?p=editar_categoria&id=<?= $categoria->getIdCategoria();?>" class="btn btn-warning">Editar</a>
        <a href="?p=borrar_categoria&id=<?= $categoria->getIdCategoria();?>" class="btn btn-danger">Borrar</a>
    </td>
    </tr> 
    <?php   
}
?>
</tbody>
</table>

<a href="?p=crear_carrera" class="btn btn-primary">Crear carrera</a>
