<?php 
$nombre = new Carrera;
$lista = $nombre->todasCarreras();
echo Alerta::get_alertas();
?>
<section class="py-8">
<div class="max-w-4xl mx-auto bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">

    <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
        <h2 class="text-xl font-bold text-slate-800">Administración de Carreras</h2>
        <a href="?p=crear_carrera" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-xl hover:bg-indigo-700 transition">
            + Crear carrera
        </a>
    </div>

    <div class="overflow-x-auto">
    <table class="w-full border-collapse text-left text-slate-700">
    <thead>
    <tr class="border-b border-slate-200">
        <th class="py-3 px-3 w-16 text-xs font-semibold uppercase tracking-wide text-slate-500">Imagen</th>
        <th class="py-3 px-3 w-16 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
        <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Carrera</th>
        <th class="py-3 px-3 w-32 text-xs font-semibold uppercase tracking-wide text-slate-500 text-center">Opciones</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($lista as $carrera) {
        ?>
        <tr class="border-b border-slate-100 hover:bg-indigo-50/50 transition">
             <td class="p-2">
                    <img 
                        src="../assets/imagenes/<?= $carrera->getImagenCarrera(); ?>" 
                        alt="<?= $carrera->getNombreCarrera(); ?>" 
                        class="w-10 h-10 object-contain"
                        onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'"
                    >
                </td>
          <td class="py-3 px-3 text-slate-400"><?= $carrera->getIdCarrera();?></td>
          <td class="py-3 px-3 font-semibold text-slate-800"><?= $carrera->getNombreCarrera();?></td>
          
          <td class="py-3 px-3 text-center whitespace-nowrap">
            <a href="?p=editar_carrera&id=<?= $carrera->getIdCarrera();?>" class="mr-2 inline-block hover:scale-125 transition">✏️</a>
            <a href="?p=borrar_carrera&id=<?= $carrera->getIdCarrera();?>" class="inline-block hover:scale-125 transition">🗑️</a>
          </td>
        </tr> 
        <?php   
    }
    ?>
    </tbody>
    </table>
    </div>

</div>
</section>