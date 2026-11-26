<?php
$productos = Producto::catalogo_completo();
?>
<section class="py-6">

    <div class="mb-8">
        <h2 class="text-3xl font-bold text-slate-800">Panel de Administración</h2>
        <p class="text-slate-500 mt-1">Seleccioná una sección para gestionar las tablas del sistema.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">


        <div class="lg:col-span-2 order-2 lg:order-1 bg-gradient-to-b from-white to-indigo-50/60 p-6 rounded-3xl border border-slate-200 shadow-md">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                <h2 class="text-xl font-bold text-slate-800">Productos</h2>
                <a href="index.php?p=crear_producto" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-xl ">
                    + Nuevo Producto
                </a>
            </div>

            <div class="overflow-x-auto">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-left text-slate-700">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                                <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Imagen</th>
                                <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Insumo</th>
                                <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Precio</th>
                                <th class="py-3 px-3 text-xs font-semibold uppercase tracking-wide text-slate-500 text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $item): ?>
                                <tr class="border-b border-slate-100 ho">
                                    <td class="py-3 px-3 text-slate-400"><?= $item->getId(); ?></td>
                                    <td class="py-3 px-3">
                                        <img
                                            src="../assets/imagenes/<?= $item->getImagen(); ?>"
                                            alt="<?= $item->getNombre(); ?>"
                                            class="w-12 h-12 object-contain bg-white rounded-xl border border-slate-100 p-1"
                                            onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'">
                                    </td>
                                    <td class="py-3 px-3 font-semibold text-slate-800"><?= $item->getNombre(); ?></td>

                                    <td class="py-3 px-3 font-semibold text-slate-800">$<?= $item->getPrecio(); ?></td>
                                    <td class="py-3 px-3 text-center whitespace-nowrap">
                                        <a href="index.php?p=editar_producto&id=<?= $item->getId(); ?>" class="mr-2 inline-bl">✏️</a>
                                        <a href="index.php?p=borrar_producto&id=<?= $item->getId(); ?>" class="inline-bl">🗑️</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="order-1 lg:order-2 flex flex-col gap-6">

            <div class=" p-6 rounded-3xl border border-slate-200 shadow-md ">
                <h2 class="text-xl font-bold text-slate-800 mb-2 pb-3 border-b border-slate-100">Carreras</h2>
                <div class="flex flex-col gap-2 mt-4">
                    <a href="index.php?p=carreras" class="bg-indigo-600 text-white text-center font-semibold px-4 py-2.5 rounded-xl ">Carreras</a>
                    <a href="index.php?p=crear_carrera" class="bg-indigo-50 text-indigo-600 text-center font-semibold px-4 py-2.5 rounded-xl ">+ Nueva Carrera</a>
                </div>
            </div>

            <div class=" p-6 rounded-3xl border border-slate-200 shadow-md ">
                <h2 class="text-xl font-bold text-slate-800 mb-2 pb-3 border-b border-slate-100">Categorías</h2>
                <div class="flex flex-col gap-2 mt-4">
                    <a href="index.php?p=categorias" class="bg-indigo-600 text-white text-center font-semibold px-4 py-2.5 rounded-xl ">Ver categorías </a>
                    <a href="index.php?p=crear_categoria" class="bg-indigo-50 text-indigo-600 text-center font-semibold px-4 py-2.5 rounded-xl h ">+ Nueva Categoría</a>
                </div>
            </div>

        </div>

    </div>

    </div>
</section>