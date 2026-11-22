<?php
$filtroActual = $_GET['filtro'] ?? 'todos';

$todasCategorias = Categoria::todasCategorias();

if ($filtroActual !== 'todos') {
    $productos = Producto::catalogo_por_idcategoria((int)$filtroActual);
}else {
    $productos = Producto::catalogo_completo();
}
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

    <div class="items-center justify-center flex flex-wrap gap-3 py-4 relative z-10">
        <a href="index.php?p=productos&filtro=todos"
            class="px-5 py-2.5 rounded-full text-xs md:text-[16px] font-bold tracking-wide transition-all <?= $filtroActual === 'todos' ? 'glass-pill-active' : 'glass-pill' ?>">
            Todos
        </a>

        <?php foreach ($todasCategorias as $cat): ?>
            <?php 
                $catId  = $cat->getIdCategoria();
                $catNombre = $cat->getNombreCategoria();  
            ?>
            <a href="index.php?p=<?= $vista; ?>&filtro=<?= $catId; ?>"
                class="px-5 py-2.5 rounded-full text-xs md:text-[16px] font-bold tracking-wide transition-all <?= (string)$filtroActual === (string)$catId ? 'glass-pill-active' : 'glass-pill' ?>"
            >
            <?= $catNombre; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <section class="relative z-10 py-6 space-y-8 md:mx-20 ">
        <article>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $item): ?>
                        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                            <div>
                                <div class="bg-white aspect-square w-full bg-slate-100/70 rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                                    <img src="assets/imagenes/<?= ($item->getImagen()); ?>" alt="<?= ($item->getNombre()); ?>"
                                        class="w-full h-full object-contain">
                                </div>

                                <?php foreach ($item->getCategoria() as $categoria): ?>
                                    <a href="index.php?p=productos&filtro=<?= $categoria['id']; ?>" class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                                        <?= ($categoria['nombre']); ?>
                                    </a>
                                <?php endforeach; ?>

                                <?php foreach ($item->getCarrera() as $carrera): ?>
                                    <a href="index.php?p=productos&filtro=<?= $carrera['id']; ?>" class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                                        <?= ($carrera['nombre']); ?>
                                    </a>
                                <?php endforeach; ?>

                                <h3 class="text-lg font-bold text-slate-800 mt-2">
                                    <?= ($item->getNombre()); ?>
                                </h3>

                                <p class="text-lg font-bold text-slate-800 mt-2">
                                    Stock: <?= ($item->getStock()); ?>
                                </p>

                                <div class="flex justify-between items-center text-[14px] text-slate-400 pt-2 border-t border-slate-100/80 mt-3">
                                    <span>Ingreso: <?= ($item->getFechaIngreso()); ?></span>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-sm text-slate-400">$<?= number_format($item->getSinIva()); ?> sin IVA</span>
                                    <span class="text-md font-black text-slate-900">
                                        $<?= number_format($item->getPrecio(), 0, ',', '.'); ?>
                                        <span class="text-sm font-normal text-slate-500">/día</span>
                                    </span>
                                </div>
                                <a href="index.php?p=detalle&id=<?= $item->getId(); ?>"
                                    class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                                    Ver detalle ★
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-slate-500 text-center col-span-3">No hay productos disponibles en este momento.</p>
                <?php endif; ?>
            </div>
        </article>
    </section>
</div>