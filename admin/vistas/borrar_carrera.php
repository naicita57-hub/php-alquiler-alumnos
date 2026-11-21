<?php

$id = $_GET['id'] ?? FALSE;
$carrera = Carrera::get_x_id($id);

?>
<section class="py-8">
    <div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

        <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Eliminar Carrera</h2>

        <div>
            <div class="mb-6">
                <h3 class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Carrera a eliminar</h3>
                <p class="w-full bg-white border border-rose-200 rounded-xl px-4 py-2.5 text-slate-800 font-semibold"><?= $carrera->getNombreCarrera(); ?></p>
            </div>
            <div class="flex items-center gap-3">
                <a href="actions/borrar_carrera_acc.php?id=<?= $carrera->getIdCarrera(); ?>" class="bg-rose-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-rose-700 transition">Eliminar</a>
                <a href="?p=carreras" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
            </div>
        </div>

    </div>
</section>