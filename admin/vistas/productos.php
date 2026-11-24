<?php
$productos = Producto::catalogo_completo();
?>

<section class="py-8">
    <div class="p-4 bg-gradient-to-b from-white to-indigo-50/60 rounded-3xl border border-slate-200 shadow-md">
        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Administración de Productos</h2>
            <a href="index.php?p=crear_producto" class="bg-indigo-600 text-white px-3 py-1 rounded-lg hover:bg-indigo-700 transition">
                + Crear Producto
            </a>
        </div>
    
        <table class="w-full border-collapse text-left text-slate-700">
            <thead>
                <tr class="border-b border-slate-200">
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Imagen</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Insumo</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Categoría</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Carrera</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Precio</th>
                    <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500 text-center">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $item): ?>
                    <tr class="border-b border-slate-100 hover:bg-indigo-50/50 transition">
                        <td class="p-2 text-slate-400"><?= $item->getId(); ?></td>
                        <td class="p-2">
                            <img
                                src="../assets/imagenes/<?= $item->getImagen(); ?>"
                                alt="<?= $item->getNombre(); ?>"
                                class="w-10 h-10 object-contain"
                                onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'">
                        </td>
                        <td class="p-2 font-semibold text-slate-800"><?= $item->getNombre(); ?></td>
                        <td class="p-2"><?= str_replace('||', ', ', $item->nombre_categoria ?? ''); ?></td>
                        <td class="p-2"><?= str_replace('||', ', ', $item->nombre_carrera ?? ''); ?></td>
                        <td class="p-2 font-semibold text-slate-800"><?= $item->getPrecio(); ?></td>
                        <td class="p-2 text-center">
                            <a href="index.php?p=editar_producto&id=<?= $item->getId(); ?>" class="mr-2 inline-block hover:scale-125 transition">✏️</a>
                            <a href="index.php?p=borrar_producto&id=<?= $item->getId(); ?>" class="inline-block hover:scale-125 transition">🗑️</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>