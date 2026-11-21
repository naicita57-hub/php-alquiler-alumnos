<?php

$carrera = new Carrera;
$lista = $carrera->todasCarreras();
?>

<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Agregar un nuevo producto</h2>

    <form action="actions/crear_producto_acc.php" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de Producto</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="nombre" name="nombre">
        </div>
        <div class="mb-4">
            <label for="presentacion" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Presentación</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="presentacion" name="presentacion">
        </div>
        <div class="mb-4">
            <label for="precio" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Precio</label>
            <input type="number" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="precio" name="precio">
        </div>
        <div class="mb-4">
            <label for="foto" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Foto</label>
            <input class="w-full bg-white border border-slate-200 rounded-xl px-2 py-2 text-sm text-slate-600 file:mr-3 file:cursor-pointer file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-1.5 file:font-semibold file:text-indigo-600 hover:file:bg-indigo-100" type="file" id="foto" name="foto">
        </div>
        <div class="mb-6">
            <label for="id_carrera" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">carrera</label>
            <select class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" aria-label="Default select example" name="id_carrera">
                <option selected>Seleccione una carrera</option>
                <?php
                foreach ($lista as $carrera) {
                ?>
                    <option value="<?= $carrera->getIdCarrera(); ?>"><?= $carrera->getCarrera(); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="flex items-center gap-3">
            <input type="submit" value="Crear" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
            <a href="?p=productos" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
        </div>
    </form>

</div>