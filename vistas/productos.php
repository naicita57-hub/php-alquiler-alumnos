<?php
$todasCategorias = Categoria::todasCategorias();
$todasCarreras   = Carrera::todasCarreras();

$categoriasSel = [];
foreach ($todasCategorias as $cat) {
    if (isset($_GET['cat' . $cat->getIdCategoria()])) {
        $categoriasSel[] = (int) $cat->getIdCategoria();
    }
}

$carrerasSel = [];
foreach ($todasCarreras as $car) {
    if (isset($_GET['car' . $car->getIdCarrera()])) {
        $carrerasSel[] = (int) $car->getIdCarrera();
    }
}

$productos = Producto::filtrar(Producto::catalogo_completo(), $categoriasSel, $carrerasSel);

$hayFiltro = $categoriasSel || $carrerasSel;
$pill = 'inline-block px-4 py-2 rounded-full text-sm font-bold cursor-pointer';
?>

<div class="bg-formas-container py-10 container-pad">

    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

    <div class="relative z-10 items-center md:text-center text-center">
        <h2 class="text-xl md:text-[40px] font-black text-slate-800">Catálogo de Insumos</h2>
        <p class="text-slate-500 text-sm md:text-[20px] mt-8">Recordá que los precios son por día</p>
    </div>

    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

    <details class="relative z-10 max-w-3xl mx-auto mb-6" <?= $hayFiltro ? 'open' : ''; ?>>
        <summary class="cursor-pointer text-center font-bold text-slate-700 py-2">Filtrar</summary>

        <form method="get" action="index.php" class="bg-white rounded-3xl border border-slate-200 p-5 space-y-4">
            <input type="hidden" name="p" value="productos">

            <fieldset>
                <legend class="text-xs font-bold uppercase text-slate-400 mb-2">Categorías</legend>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($todasCategorias as $cat): ?>
                        <label>
                            <input type="checkbox" class="peer sr-only" name="cat<?= $cat->getIdCategoria(); ?>"
                                <?= in_array((int) $cat->getIdCategoria(), $categoriasSel, true) ? 'checked' : ''; ?>>
                            <span class="<?= $pill; ?> bg-indigo-50 text-indigo-600 peer-checked:bg-indigo-600 peer-checked:text-white">
                                <?= htmlspecialchars($cat->getNombreCategoria()); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <fieldset>
                <legend class="text-xs font-bold uppercase text-slate-400 mb-2">Carreras</legend>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($todasCarreras as $car): ?>
                        <label>
                            <input type="checkbox" class="peer sr-only" name="car<?= $car->getIdCarrera(); ?>"
                                <?= in_array((int) $car->getIdCarrera(), $carrerasSel, true) ? 'checked' : ''; ?>>
                            <span class="<?= $pill; ?> bg-emerald-50 text-emerald-600 peer-checked:bg-emerald-600 peer-checked:text-white">
                                <?= htmlspecialchars($car->getNombreCarrera()); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </fieldset>

            <div class="flex gap-3">
                <button type="submit" class="bg-indigo-600 text-white font-bold px-5 py-2 rounded-xl">Filtrar</button>
                <a href="index.php?p=productos" class="bg-slate-100 text-slate-700 font-bold px-5 py-2 rounded-xl">Limpiar</a>
            </div>
        </form>
    </details>

    <section class="relative z-10 py-6 space-y-8 md:mx-20">
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $item): ?>
                        <article class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="bg-white aspect-square w-full rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                                        <img src="assets/imagenes/<?= ($item->getImagen()); ?>"
                                            alt="<?= ($item->getNombre()); ?>"
                                            class="w-full h-full object-contain">
                                    </div>

                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach ($item->getCategoria() as $categoria): ?>
                                            <a href="index.php?p=productos&cat<?= $categoria['id']; ?>=on"
                                                class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                                                <?= ($categoria['nombre']); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>

                                    <h3 class="text-lg font-bold text-slate-800 mt-2">
                                        <?= ($item->getNombre()); ?>
                                    </h3>
                                </div>

                                <div class="mt-3">
                                    <div class="flex justify-between items-center text-[14px] text-slate-400 pt-2 border-t border-slate-100/80">
                                        <span>Ingreso: <?= ($item->getFechaIngreso()); ?></span>
                                    </div>

                                    <div class="flex flex-wrap gap-3 text-xs font-semibold mt-2.5">
                                        <div class="bg-slate-100 px-3 py-1.5 rounded-xl text-slate-700 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full <?= $item->getStock() > 2 ? 'bg-emerald-500' : 'bg-rose-500'; ?>"></span>
                                            <span>Stock: <strong><?= (int) $item->getStock(); ?> unidades</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-sm text-slate-400">$<?= number_format((float) $item->getSinIva(), 2, ',', '.'); ?> sin IVA</span>
                                    <span class="text-md font-black text-slate-900">
                                        $<?= number_format((float) $item->getPrecio(), 0, ',', '.'); ?>
                                        <span class="text-sm font-normal text-slate-500">/día</span>
                                    </span>
                                </div>
                                <a href="index.php?p=detalle&id=<?= (int) $item->getId(); ?>"
                                    class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                                    Ver detalle
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-slate-500 text-center col-span-3">No hay productos disponibles en este momento.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>