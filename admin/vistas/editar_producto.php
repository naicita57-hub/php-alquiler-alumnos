<?php
$id = $_GET['id'] ?? false;
$producto = $id ? Producto::get_x_id((int) $id) : null;
$categorias = Categoria::todasCategorias();
$carreras = Carrera::todasCarreras();
// <!-- temporal para probar hasta q andre haga en producto --!>

$catsActuales = [];
$carrerasActuales = [];

if ($producto) {
    if (method_exists($producto, 'getCategoriasIds')) {
        $catsActuales = array_map('intval', (array) $producto->getCategoriasIds());
    } elseif (method_exists($producto, 'getCategorias')) {
        foreach ((array) $producto->getCategorias() as $item) {
            if (is_object($item) && method_exists($item, 'getIdCategoria')) {
                $catsActuales[] = (int) $item->getIdCategoria();
            } elseif (is_array($item) && isset($item['id_categoria'])) {
                $catsActuales[] = (int) $item['id_categoria'];
            } else {
                $catsActuales[] = (int) $item;
            }
        }
    }

    if (method_exists($producto, 'getCarrerasIds')) {
        $carrerasActuales = array_map('intval', (array) $producto->getCarrerasIds());
    } elseif (method_exists($producto, 'getCarreras')) {
        foreach ((array) $producto->getCarreras() as $item) {
            if (is_object($item) && method_exists($item, 'getIdCarrera')) {
                $carrerasActuales[] = (int) $item->getIdCarrera();
            } elseif (is_array($item) && isset($item['id_carrera'])) {
                $carrerasActuales[] = (int) $item['id_carrera'];
            } else {
                $carrerasActuales[] = (int) $item;
            }
        }
    }
}
?>

<div class="max-w-3xl mx-auto my-6 bg-white border border-slate-200 rounded-2xl shadow-sm p-6 md:p-8">
    <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Editar producto</h2>
            <p class="text-sm text-slate-500 mt-0.5">Actualiza los datos, la imagen o las relaciones del producto.</p>
        </div>
        <a href="?p=productos" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition">
            ← Volver al listado
        </a>
    </div>

    <?php if ($producto): ?>
        <form action="actions/editar_producto_acc.php" method="post" enctype="multipart/form-data" class="space-y-5">
            <input type="hidden" name="id" value="<?= htmlspecialchars((string) $producto->getId()); ?>">
            <input type="hidden" name="imagen_og" value="<?= htmlspecialchars((string) $producto->getImagen()); ?>">

            <div>
                <label for="nombre" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Nombre de producto
                </label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?= htmlspecialchars((string) $producto->getNombre()); ?>"
                    required
                    class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
                >
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Descripción
                </label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="3"
                    class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
                ><?= htmlspecialchars((string) $producto->getDescripcion()); ?></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="precio" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Precio
                    </label>
                    <input
                        type="number"
                        id="precio"
                        name="precio"
                        value="<?= htmlspecialchars((string) $producto->getPrecio()); ?>"
                        min="0"
                        step="any"
                        required
                        class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
                    >
                </div>

                <div>
                    <label for="stock" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Stock
                    </label>
                    <input
                        type="number"
                        id="stock"
                        name="stock"
                        value="<?= htmlspecialchars((string) $producto->getStock()); ?>"
                        min="0"
                        required
                        class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
                    >
                </div>

                <div>
                    <label for="fecha_ingreso" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Fecha de ingreso
                    </label>
                    <input
                        type="date"
                        id="fecha_ingreso"
                        name="fecha_ingreso"
                        value="<?= htmlspecialchars((string) $producto->getFechaIngreso()); ?>"
                        class="w-full rounded-xl border border-slate-300 px-3.5 py-2.5 text-slate-800 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition"
                    >
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 items-start bg-slate-50 border border-slate-200/80 rounded-xl p-4">
                <div>
                    <span class="block text-sm font-semibold text-slate-700 mb-2">Imagen actual</span>
                    <?php if ($producto->getImagen()): ?>
                        <img
                            src="../assets/imagenes/<?= htmlspecialchars((string) $producto->getImagen()); ?>"
                            alt="Imagen actual de <?= htmlspecialchars((string) $producto->getNombre()); ?>"
                            class="w-28 h-28 object-cover rounded-xl border border-slate-200 bg-white"
                        >
                    <?php else: ?>
                        <div class="w-28 h-28 rounded-xl border border-dashed border-slate-300 flex items-center justify-center text-xs text-slate-400 bg-white">
                            Sin imagen
                        </div>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Cambiar imagen (opcional)
                    </label>
                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept="image/*"
                        class="block w-full text-sm text-slate-600 file:mr-3 file:py-2 file:px-3.5 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer"
                    >
                    <p class="text-xs text-slate-400 mt-1.5">Si no eliges un archivo nuevo, se conserva la imagen actual.</p>
                </div>
            </div>

            <!-- Checkboxes de Categorías -->
            <div>
                <span class="block text-sm font-semibold text-slate-700 mb-2">Categorías</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5 bg-slate-50 border border-slate-200/80 rounded-xl p-4">
                    <?php foreach ($categorias as $cat): ?>
                        <?php
                        $idCat = (int) $cat->getIdCategoria();
                        $checkedCat = in_array($idCat, $catsActuales, true) ? 'checked' : '';
                        ?>
                        <label class="flex items-center gap-2.5 p-2 rounded-lg bg-white border border-slate-200/70 hover:border-indigo-300 cursor-pointer transition">
                            <input
                                type="checkbox"
                                name="categorias[]"
                                value="<?= $idCat; ?>"
                                <?= $checkedCat; ?>
                                class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300"
                            >
                            <span class="text-sm text-slate-700 font-medium">
                                <?= htmlspecialchars((string) $cat->getNombreCategoria()); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Checkboxes de Carreras -->
            <div>
                <span class="block text-sm font-semibold text-slate-700 mb-2">Carreras</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5 bg-slate-50 border border-slate-200/80 rounded-xl p-4">
                    <?php foreach ($carreras as $carrera): ?>
                        <?php
                        $idCarrera = (int) $carrera->getIdCarrera();
                        $checkedCarrera = in_array($idCarrera, $carrerasActuales, true) ? 'checked' : '';
                        ?>
                        <label class="flex items-center gap-2.5 p-2 rounded-lg bg-white border border-slate-200/70 hover:border-indigo-300 cursor-pointer transition">
                            <input
                                type="checkbox"
                                name="carreras[]"
                                value="<?= $idCarrera; ?>"
                                <?= $checkedCarrera; ?>
                                class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300"
                            >
                            <span class="text-sm text-slate-700 font-medium">
                                <?= htmlspecialchars((string) $carrera->getNombreCarrera()); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a
                    href="?p=productos"
                    class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 font-semibold text-sm hover:bg-slate-50 transition"
                >
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="px-5 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-semibold text-sm shadow-sm transition cursor-pointer"
                >
                    Guardar cambios
                </button>
            </div>
        </form>
    <?php else: ?>
        <div class="text-center py-8">
            <p class="text-slate-600 mb-4">No se encontró el producto seleccionado.</p>
            <a href="?p=productos" class="inline-block px-4 py-2 rounded-xl bg-indigo-600 text-white font-semibold text-sm hover:bg-indigo-700 transition">
                Volver
            </a>
        </div>
    <?php endif; ?>
</div>