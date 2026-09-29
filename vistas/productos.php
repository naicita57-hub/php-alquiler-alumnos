<?php
    require_once "clases/Producto.php";
    $productos = Producto::catalogo_completo();
?>

<section class= "py-6 space-y-8">
    <div class= "">
        <h1 class="text-3xl font-black text-slate-800">Catálogo de Insumos</h1>
        <p  class="text-slate-500 text-sm mt-1">Recordá que los precios son por día</p>
    </div>

    <!-- Grid prod -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
        <?php foreach ($productos as $item):?>

            <!-- tarjeta ind -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all overflow-hidden flex flex-col justify-between">
                <div class= "h-60 bg-white relative overflow-hidden">
                    <img src="imagenes/<?= $item->getImagen() ?>" alt="<?= $item->getNombre() ?>" class="w-full h-full object-cover" > 
                    </img>
                    <span class="absolute top-3 right-3 bg-slate-900/80 backdrop-blur-sm text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider"> $<?= $item->getCategoria() ?>
                    </span>
                </div>

                <!-- datos del prodd--> 
                <div class="p-5 space-y-2">
                    <h2 class="font-bold text-slate-800 text-lg leading-snug"> <?= $item->getNombre() ?> </h2>
                    <div class="flex justify-between items-center text-[11px] text-slate-400 pt-1">
                        <span>Stock disponible: <?= $item->getStock() ?></span>
                        <span>Fecha de ingreso: <?= $item-> getFechaIngreso() ?></span>
                    </div>
                </div>

                <div>
                    <div class="p-5 pt-0 flex items-center justify-between border-t border-slate-100 mt-4">
                        <span class="text-m font-black text-green-600">Precio por día: $<?= $item-> getPrecio() ?> </span>
                        <span></span>
                        <a href="index.php?p=detalle&id=<?= $item->getId();?>" class ="bg-slate-900 hover:bg-indigo-600 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors">Ver más</a>
                    </div>
                </div>
            </div> 

        <?php endforeach; ?>
    </div> 

</section>
