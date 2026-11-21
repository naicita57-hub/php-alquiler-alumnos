<?php
$id = $_GET['id'] ?? false;
$producto = $id ? Producto::get_x_id((int)$id) : null;
$categorias = Categoria::todasCategorias();
$carreras = Carrera::todasCarreras();
?>

<h2>Editar producto</h2>

<?php if ($producto): ?>
<form action="actions/editar_producto_acc.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $producto->getId(); ?>">

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de Producto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $producto->getNombre(); ?>">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion"><?= $producto->getDescripcion(); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto->getPrecio(); ?>">
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= $producto->getStock(); ?>">
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?= $producto->getFechaIngreso(); ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Imagen actual</label><br>
        <img src="../assets/img/productos/<?= $producto->getImagen(); ?>" alt="Imagen actual" width="100">
        <input type="hidden" name="imagen_og" value="<?= $producto->getImagen(); ?>">
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Nueva imagen</label>
        <input class="form-control" type="file" id="imagen" name="imagen">
    </div>

    <div class="mb-3">
        <label for="id_categoria" class="form-label">Categoría</label>
        <select class="form-select" id="id_categoria" name="id_categoria">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat->getIdCategoria(); ?>"><?= $cat->getNombreCategoria(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_carrera" class="form-label">Carrera</label>
       <select class="form-select" name="id_carrera" id="id_carrera">
    <option value="" selected disabled>Seleccione una carrera</option>
    <?php foreach ($carreras as $carrera): ?>
        <option value="<?= $carrera->getIdCarrera(); ?>"><?= $carrera->getNombreCarrera(); ?></option>
    <?php endforeach; ?>
</select>
    </div>

    <input type="submit" class="btn btn-warning" value="Editar">
    <a href="?p=productos" class="btn btn-danger">Cancelar</a>
</form>
<?php else: ?>
    <p>No se encontró el producto seleccionado.</p>
    <a href="?p=productos" class="btn btn-primary">Volver</a>
<?php endif; ?>