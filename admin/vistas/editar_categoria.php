<?php


$id = $_GET['id'] ?? FALSE;
$nombre = Categoria::get_x_id($id);

if(!is_null($nombre)){
?>
<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <h2 class="text-xl font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Editar categoría</h2>

    <form action="actions/editar_categoria_acc.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $nombre->getIdCategoria(); ?>" >
        <div class="mb-4">
            <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-2">Nombre de categoría</label>
            <input type="text" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition" id="nombre" name="nombre" value="<?= $nombre->getNombreCategoria(); ?>" required>
        </div>
        <div class="flex items-center gap-3">
            <input type="submit" value="Editar" class="bg-indigo-600 text-white font-semibold px-5 py-2 rounded-xl hover:bg-indigo-700 transition cursor-pointer">
            <a href="?p=categorias" class="bg-indigo-50 text-indigo-600 font-semibold px-5 py-2 rounded-xl hover:bg-indigo-100 transition">Cancelar</a>
        </div>
    </form>

</div>
</section>
<?php 
}else{
    ?>
<section class="py-8">
<div class="max-w-xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md text-center">
    <h1 class="text-xl font-bold text-slate-800 mb-2">No encontramos la Categoría para editar</h1>
    <p class="text-slate-500">Volver a <a href="?p=categorias" class="text-indigo-600 font-semibold hover:underline">editar Categoría</a></p>
</div>
</section>
    <?php
}
?>