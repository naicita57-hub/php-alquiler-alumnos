<?php
?>

<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Agregar una nueva carrera</h2>

    <form action="actions/crear_carrera_acc.php" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="carrera" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de la carrera</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="carrera" name="carrera" required>
        </div>
        <div class="flex items-center gap-3">
            <input type="submit" value="Crear" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
            <a href="?p=carreras" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
        </div>
    </form>

