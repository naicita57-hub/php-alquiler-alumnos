<?php
$filtroActual = $_GET['filtro'] ?? 'todos';
$idCarrera    = (int) ($_GET['carrera'] ?? 0);

$todasCategorias = Categoria::todasCategorias();
$todasCarreras   = Carrera::todasCarreras();

if ($idCarrera > 0) {
    $productos = Producto::catalogo_x_idcarrera($idCarrera);
} elseif ($filtroActual !== 'todos') {
    $productos = Producto::catalogo_x_idcategoria((int) $filtroActual);
} else {
    $productos = Producto::catalogo_completo();
}

$hayFiltro = ($idCarrera > 0 || $filtroActual !== 'todos');

$clasePill = 'px-4 py-2 rounded-full text-sm font-bold transition-all';
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
<!-- Botón de filtros -->
    <div class="flex justify-center py-4 relative z-10">
        <button type="button" id="abrirFiltros"
            class="glass-pill px-6 py-2.5 rounded-full text-xs md:text-[16px] font-bold tracking-wide transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M6 12h12M10 20h4" />
            </svg>
            Filtrar
            <?php if ($hayFiltro): ?>
                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
            <?php endif; ?>
        </button>
    </div>

    <section class="relative z-10 py-6 space-y-8 md:mx-20">
        <article>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                <?php if (!empty($productos)): ?>
          <?php foreach ($productos as $item): ?>
    <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
        <div class="flex-1 flex flex-col justify-between">
            <div>
                <div class="bg-white aspect-square w-full rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                    <img src="assets/imagenes/<?= ($item->getImagen()); ?>"
                        alt="<?= ($item->getNombre()); ?>"
                        class="w-full h-full object-contain">
                </div>

                <div class="flex flex-wrap gap-1">
                    <?php foreach ($item->getCategoria() as $categoria): ?>
                        <a href="index.php?p=productos&filtro=<?= (int) $categoria['id']; ?>"
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
    </div>
<?php endforeach; ?>
                <?php else: ?>
                    <p class="text-slate-500 text-center col-span-3">No hay productos disponibles en este momento.</p>
                <?php endif; ?>
            </div>
        </article>
    </section>

<!-- Overlay -->
<div id="filtrosOverlay"
    class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300"></div>

<!-- Panel lateral -->
<aside id="filtrosPanel"
    class="fixed top-0 left-0 h-full w-80 max-w-[85%] bg-white/95 backdrop-blur-md shadow-2xl z-50 -translate-x-full transition-transform duration-300 flex flex-col">

    <div class="flex items-center justify-between p-5 border-b border-slate-200/80">
        <h3 class="text-xl font-black text-slate-800">Filtros</h3>
        <button type="button" id="cerrarFiltros"
            class="w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-colors"
            aria-label="Cerrar">✕</button>
    </div>

    <div class="flex-1 overflow-y-auto p-5 space-y-6">

        <div>
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Categorías</h4>
            <div class="flex flex-wrap gap-2">
                <a href="index.php?p=productos&filtro=todos"
                    class="<?= $clasePill ?> <?= !$hayFiltro ? 'bg-indigo-600 text-white shadow-sm' : 'bg-indigo-50 text-indigo-600 hover:bg-indigo-100' ?>">
                    Todos
                </a>
                <?php foreach ($todasCategorias as $cat): ?>
                    <?php
                    $catId     = $cat->getIdCategoria();
                    $catNombre = $cat->getNombreCategoria();
                    $activa    = $idCarrera === 0 && (string) $filtroActual === (string) $catId;
                    ?>
                    <a href="index.php?p=productos&filtro=<?= $catId; ?>"
                        class="<?= $clasePill ?> <?= $activa ? 'bg-indigo-600 text-white shadow-sm' : 'bg-indigo-50 text-indigo-600 hover:bg-indigo-100' ?>">
                        <?= htmlspecialchars($catNombre); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div>
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Carreras</h4>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($todasCarreras as $car): ?>
                    <?php
                    $carId     = $car->getIdCarrera();
                    $carNombre = $car->getNombreCarrera();
                    $activa    = $idCarrera === (int) $carId;
                    ?>
                    <a href="index.php?p=productos&carrera=<?= $carId; ?>"
                        class="<?= $clasePill ?> <?= $activa ? 'bg-emerald-600 text-white shadow-sm' : 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' ?>">
                        <?= htmlspecialchars($carNombre); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php if ($hayFiltro): ?>
        <div class="p-5 border-t border-slate-200/80">
            <a href="index.php?p=productos&filtro=todos"
                class="block text-center w-full bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold px-4 py-2.5 rounded-xl transition-colors">
                Limpiar filtros
            </a>
        </div>
    <?php endif; ?>
</aside>

<script>
    const panel = document.getElementById('filtrosPanel');
    const overlay = document.getElementById('filtrosOverlay');

    function abrirFiltros() {
        panel.classList.remove('-translate-x-full');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        document.body.classList.add('overflow-hidden');
    }

    function cerrarFiltros() {
        panel.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        document.body.classList.remove('overflow-hidden');
    }

    document.getElementById('abrirFiltros').addEventListener('click', abrirFiltros);
    document.getElementById('cerrarFiltros').addEventListener('click', cerrarFiltros);
    overlay.addEventListener('click', cerrarFiltros);
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') cerrarFiltros();
    });
</script>