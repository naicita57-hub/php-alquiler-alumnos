<?php
// 1. Requerimos las clases necesarias (si no las carga tu autoloader)
require_once("../clases/Carrera.php");
require_once("../clases/Categoria.php");

// 2. Traemos las listas para los desplegables (<select>)
$carreras = Carrera::todasCarreras();
$categorias = Categoria::todasCategorias();
?>
<h2>Agregar un nuevo producto</h2>
<form action="actions/crear_producto_acc.php" method="post" enctype="multipart/form-data">
   <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre del Producto</label>
            <input type="text" class="w-full border border-gray-300 rounded p-2 text-sm" id="nombre" name="nombre" required>
        </div>
    <div class="mb-3">
        <label for="presentacion" class="form-label">Presentación</label>
        <input type="text" class="form-control" id="presentacion" name="presentacion">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
  <input class="form-control" type="file" id="foto" name="foto">
    </div>
    <div class="mb-3">
        <label for="id_marca" class="form-label">Marca</label>
        <select class="form-select" aria-label="Default select example" name="id_marca">
            <option selected>Seleccione una marca</option>
            <?php
            foreach ($lista as $carrera) {
            ?>
                <option value="<?=$carrera->getIdCarrera();?>"><?=$marca->getCarrera();?></option>
            <?php
            }
            ?>
        </select>    
    </div>
    <input type="submit" value="Crear">
    <a href="?sec=productos" class="btn btn-danger">Cancelar</a>
</form>