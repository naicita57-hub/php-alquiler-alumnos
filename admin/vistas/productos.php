<section class="relative z-10 py-6 space-y-8 md:mx-20 ">
        <article>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4">
                <?php foreach ($productos as $item): ?>


                    <div
                        class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                        <div>

                            <div
                                class=" bg-white aspect-square w-full bg-slate-100/70 rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                                <img src="imagenes/<?= $item->getImagen(); ?>" alt="<?= $item->getNombre(); ?>"
                                    class="w-full h-full object-contain">
                            </div>


                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                                <?= $item->getCategoria(); ?>
                            </span>


                            <h3 class="text-lg font-bold text-slate-800 mt-2">
                                <?= $item->getNombre(); ?>
                            </h3>


                            <div
                                class="flex justify-between items-center text-[14px] text-slate-400 pt-2 border-t border-slate-100/80 mt-3">
                                <span>Stock: <?= $item->getStock(); ?></span>
                                <span>Ingreso: <?= $item->getFechaIngreso(); ?></span>
                            </div>
                        </div>


                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-sm font-black text-slate-900">
                                $<?= number_format($item->getPrecio(), 0, ',', '.'); ?> <span
                                    class="text-sm font-normal text-slate-500">/día</span>
                            </span>
                            <a href="index.php?p=detalle&id=<?= $item->getId(); ?>"
                                class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-m font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                                Ver detalle ★
                            </a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </article>
    </section>