<?php


$id = $_GET['id'] ?? FALSE;
$carrera = Carrera::get_x_id($id);

if(!is_null($carrera)){
?>
<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Editar carrera</h2>

    <form action="actions/editar_carrera_acc.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $carrera->getIdCarrera(); ?>" >
        <div class="mb-4" >
            <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de carrera</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="nombre" name="nombre" value="<?= $carrera->getNombre(); ?>" required>
        </div>
      <div class="mb-4">
                <span class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Imagen actual</span>
                <?php if ($carrera->getImagenCarrera()): ?>
                    <div class="bg-white w-28 h-28 border border-slate-200 rounded-xl overflow-hidden flex items-center justify-center p-2">
                        <img src="../assets/imagenes/<?= $carrera->getImagenCarrera(); ?>" alt="Imagen actual de <?= $carrera->getNombre(); ?>" class="w-full h-full object-contain" >
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
        <div class="flex items-center gap-3">
            <input type="submit" value="Editar" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
            <a href="?p=carreras" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
        </div>
    </form>

</div>
</section>
<?php 
}else{
    ?>
<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md text-center">
    <h1 class="text-xl font-bold text-slate-800 mb-2">No encontramos la Carrera para editar</h1>
    <p class="text-slate-500">Volver a <a href="?p=carreras" class="text-indigo-600 font-semibold hover:underline">editar Carrera</a></p>
</div>
</section>
    <?php
}
?>