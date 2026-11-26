<?php
$carrera = new Carrera;
$listaCarreras = $carrera->todasCarreras();

$categoria = new Categoria;
$listaCategorias = $categoria->todasCategorias();
?>

<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Agregar un nuevo producto</h2>

    <form action="actions/crear_producto_acc.php" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de Producto</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="nombre" name="nombre" required>
        </div>
        <div class="mb-4">
            <label for="presentacion" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Descripción</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="presentacion" name="presentacion">
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Precio</label>
            <input type="number" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="precio" name="precio" required>
        </div>
         <div class="mb-4">
            <label for="stock" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Stock</label>
            <input type="number" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="stock" name="stock" required>
        </div>
        <div class="mb-4">
            <label for="foto" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Foto</label>
            <input class="w-full bg-white border border-slate-200 rounded-xl px-2 py-2 text-sm text-slate-600 file:mr-3 file:cursor-pointer file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-1.5 file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100" type="file" id="foto" name="foto" required>
        </div>
        <div class="mb-6">
            <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Carreras</span>
            <div class="bg-white border border-slate-200 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <?php foreach ($listaCarreras as $carrera): ?>
                    <label class="flex items-center gap-2.5 text-sm text-slate-700 cursor-pointer">
                        <input type="checkbox" name="carreras[]"  value="<?= $carrera->getIdCarrera(); ?>" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500" >
                        <span><?= $carrera->getNombreCarrera(); ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mb-6">
            <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Categorías</span>
            <div class="bg-white border border-slate-200 rounded-xl p-4 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <?php foreach ($listaCategorias as $categoria): ?>
                    <label class="flex items-center gap-2.5 text-sm text-slate-700 cursor-pointer">
                        <input type="checkbox" name="categorias[]" value="<?= $categoria->getIdCategoria(); ?>" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                        <span><?= $categoria->getNombreCategoria(); ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <input type="submit" value="Crear" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
            <a href="?p=productos" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
        </div>
    </form>

</div>
</section>