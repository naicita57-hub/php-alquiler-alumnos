<?php

$id = $_GET['id'] ?? FALSE;
$producto = Producto::get_x_id($id);


?>
<h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Borrar producto</h2>
<div class="row">
    <div class="mb-6">
        <h3 class= "block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de producto</h3>
        <p class= "w-full bg-white border border-rose-200 rounded-xl px-4 py-2.5 text-slate-800 font-semibold"><?= $producto->getNombre(); ?></p>
    </div>
    <div class="flex items-center gap-3">
        <a href="actions/borrar_producto_acc.php?id=<?= $producto->getId(); ?>" class="bg-rose-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-rose-700 transitionr">Eliminar</a>
        <a href="?p=productos" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
    </div>
</div>