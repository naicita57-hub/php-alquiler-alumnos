<?php
$productos = Producto::catalogo_completo();
echo Alerta::get_alertas();
?>

<section class="py-8">
    <div class="p-4 bg-gradient-to-b from-white to-indigo-50/60 rounded-3xl border border-slate-200 shadow-md">
        <div class="flex flex-wrap justify-between items-center gap-3 mb-4 pb-3 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Administración de Productos</h2>
            <a href="index.php?p=crear_producto" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-xl hover:bg-indigo-700 transition">
                + Crear Producto
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left text-slate-700">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="hidden sm:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Imagen</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Insumo</th>
                        <th class="hidden md:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Descripción</th>
                        <th class="hidden lg:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Categoría</th>
                        <th class="hidden lg:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Carrera</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Precio</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Stock</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500 text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $item): ?>
                        <tr class="border-b border-slate-100 hover:bg-indigo-50/50 transition">
                            <td class="hidden sm:table-cell p-2 text-slate-400"><?= $item->getId(); ?></td>
                            <td class="p-2">
                                <img
                                    src="../assets/imagenes/<?= $item->getImagen(); ?>"
                                    alt="<?= $item->getNombre(); ?>"
                                    class="w-10 h-10 object-contain"
                                    onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'">
                            </td>
                            <td class="p-2 font-semibold text-slate-800 min-w-[8rem]">
                                <?= $item->getNombre(); ?>
                                <span class="block lg:hidden text-xs font-normal text-slate-400">
                                    <?= str_replace('||', ', ', $item->nombre_categoria ?? ''); ?>
                                </span>
                            </td>
                            <td class="hidden md:table-cell p-2 text-sm text-slate-500 max-w-xs">
                                <p class="line-clamp-2"><?= $item->getDescripcion(); ?></p>
                            </td>
                            <td class="hidden lg:table-cell p-2"><?= str_replace('||', ', ', $item->nombre_categoria ?? ''); ?></td>
                            <td class="hidden lg:table-cell p-2"><?= str_replace('||', ', ', $item->nombre_carrera ?? ''); ?></td>
                            <td class="p-2 font-semibold text-slate-800 whitespace-nowrap">$<?= $item->getPrecio(); ?></td>
                            <td class="p-2 font-semibold text-slate-800 whitespace-nowrap"><?= $item->getStock(); ?></td>
                            <td class="p-2 text-center whitespace-nowrap">
                                <a href="index.php?p=editar_producto&id=<?= $item->getId(); ?>" class="mr-2 inline-block hover:scale-125 transition"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-5 h-5 inline-block fill-current">
                                        <path d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z" />
                                    </svg></a>
                                <a href="index.php?p=borrar_producto&id=<?= $item->getId(); ?>" class="inline-block hover:scale-125 transition"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-5 h-5 inline-block fill-current">
                                        <path d="M232.7 69.9C237.1 56.8 249.3 48 263.1 48L377 48C390.8 48 403 56.8 407.4 69.9L416 96L512 96C529.7 96 544 110.3 544 128C544 145.7 529.7 160 512 160L128 160C110.3 160 96 145.7 96 128C96 110.3 110.3 96 128 96L224 96L232.7 69.9zM128 208L512 208L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 208zM216 272C202.7 272 192 282.7 192 296L192 488C192 501.3 202.7 512 216 512C229.3 512 240 501.3 240 488L240 296C240 282.7 229.3 272 216 272zM320 272C306.7 272 296 282.7 296 296L296 488C296 501.3 306.7 512 320 512C333.3 512 344 501.3 344 488L344 296C344 282.7 333.3 272 320 272zM424 272C410.7 272 400 282.7 400 296L400 488C400 501.3 410.7 512 424 512C437.3 512 448 501.3 448 488L448 296C448 282.7 437.3 272 424 272z" />
                                    </svg></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>