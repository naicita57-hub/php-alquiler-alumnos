<?php
$id = $_GET['id'] ?? false;
$producto = $id ? Producto::get_x_id((int) $id) : null;
$categorias = Categoria::todasCategorias();
$carreras = Carrera::todasCarreras();

$catsActuales = $producto
    ? array_map('intval', array_column($producto->getCategoria(), 'id'))
    : [];

$carrerasActuales = $producto
    ? array_map('intval', array_column($producto->getCarrera(), 'id'))
    : [];
?>

<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Editar producto</h2>

    <?php if ($producto): ?>
        <form action="actions/editar_producto_acc.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $producto->getId(); ?>">
            <input type="hidden" name="imagen_og" value="<?= $producto->getImagen(); ?>" required>

            <div class="mb-4">
                <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de Producto</label>
                <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="nombre" name="nombre" value="<?= $producto->getNombre(); ?>" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Descripción</label>
                <textarea class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="descripcion" name="descripcion" rows="3"><?= $producto->getDescripcion(); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="precio" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Precio</label>
                <input type="number" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="precio" name="precio" value="<?= $producto->getPrecio(); ?>" min="0" step="any" required>
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Stock</label>
                <input type="number" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="stock" name="stock" value="<?= $producto->getStock(); ?>" min="0" required>
            </div>

            <div class="mb-4">
                <label for="fecha_ingreso" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Fecha de ingreso</label>
                <input type="date" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="fecha_ingreso" name="fecha_ingreso" value="<?= $producto->getFechaIngreso(); ?>" required>
            </div>

            <div class="mb-4">
                <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Imagen actual</span>
                <?php if ($producto->getImagen()): ?>
                    <div class="bg-white w-28 h-28 border border-slate-200 rounded-xl overflow-hidden flex items-center justify-center p-2">
                        <img src="../assets/imagenes/<?= $producto->getImagen(); ?>" alt="Imagen actual de <?= $producto->getNombre(); ?>" class="w-full h-full object-contain" >
                    </div>
                <?php else: ?>
                    <div class="w-28 h-28 bg-white border border-dashed border-slate-300 rounded-xl flex items-center justify-center text-xs text-slate-400">
                        Sin imagen
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label for="imagen" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Cambiar foto (opcional)</label>
                <input class="w-full bg-white border border-slate-200 rounded-xl px-2 py-2 text-sm text-slate-600 file:mr-3 file:cursor-pointer file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-1.5 file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100" type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png, .webp">
                <p class="text-xs text-slate-400 mt-2" required>Si no elegís un archivo nuevo, se conserva la imagen actual.</p>
            </div>

            <div class="mb-6">
                <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Carreras</span>
                <div class="bg-white border border-slate-200 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <?php foreach ($carreras as $carrera): ?>
                        <?php
                        $idCarrera = (int) $carrera->getId();
                        $checkedCarrera = in_array($idCarrera, $carrerasActuales, true) ? 'checked' : '';
                        ?>
                        <label class="flex items-center gap-2.5 text-sm text-slate-700 cursor-pointer">
                            <input type="checkbox" name="carreras[]" value="<?= $idCarrera; ?>" <?= $checkedCarrera; ?> class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <span><?= $carrera->getNombre(); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="mb-6">
                <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Categorías</span>
                <div class="bg-white border border-slate-200 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    <?php foreach ($categorias as $cat): ?>
                        <?php
                        $idCat = (int) $cat->getId();
                        $checkedCat = in_array($idCat, $catsActuales, true) ? 'checked' : '';
                        ?>
                        <label class="flex items-center gap-2.5 text-sm text-slate-700 cursor-pointer">
                            <input type="checkbox" name="categorias[]" value="<?= $idCat; ?>" <?= $checkedCat; ?> required class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <span><?= $cat->getNombre(); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="submit" value="Guardar cambios" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
                <a href="?p=productos" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
            </div>
        </form>
    <?php else: ?>
        <div class="text-center py-6">
            <p class="text-slate-600 mb-4">No se encontró el producto seleccionado.</p>
            <a href="?p=productos" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Volver</a>
        </div>
    <?php endif; ?>

</div>
</section>
