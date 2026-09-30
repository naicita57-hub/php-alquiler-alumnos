<?php
    require_once "clases/Producto.php";
    $carreraFiltro = $_GET['carrera'] ?? 'todos';
    if ($carreraFiltro !== 'todos'){
        $productos = Producto::catalogo_carrera($carreraFiltro);
    }else {
        $productos = Producto::catalogo_completo();
    }
   
?>
<div class="bg-formas-container py-10">

    <!-- Capa de luces??? -->
    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

 <div class="relative z-10">
        <h1 class=" items-center text-3xl font-black text-slate-800">Catálogo de Insumos</h1>
        <p class="text-slate-500 text-sm mt-1">Recordá que los precios son por día</p>
    </div>

   
    <div class=" items-center justify-center flex flex-wrap gap-3 py-2">
        <a href="index.php?p=productos&carrera=todos" 
           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wide transition-all <?= $carreraFiltro === 'todos' ? 'glass-pill-active' : 'glass-pill' ?>">
             Todos
        </a>

        <a href="index.php?p=productos&carrera=Cine y NF" 
           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wide transition-all <?= $carreraFiltro === 'Cine y NF' ? 'glass-pill-active' : 'glass-pill' ?>">
             Cine y NF
        </a>

        <a href="index.php?p=productos&carrera=Diseño Gráfico" 
           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wide transition-all <?= $carreraFiltro === 'Diseño Gráfico' ? 'glass-pill-active' : 'glass-pill' ?>">
             Diseño Gráfico
        </a>

        <a href="index.php?p=productos&carrera=Programación" 
           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wide transition-all <?= $carreraFiltro === 'Programación' ? 'glass-pill-active' : 'glass-pill' ?>">
            Programación
        </a>

        <a href="index.php?p=productos&carrera=Videojuegos" 
           class="px-5 py-2.5 rounded-full text-xs font-bold tracking-wide transition-all <?=  $carreraFiltro === 'Videojuegos' ? 'glass-pill-active' : 'glass-pill' ?>">
            Videojuegos
        </a>
    </div>

<section class="relative z-10 py-6 space-y-8">


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"> 
        <?php foreach ($productos as $item): ?>

           
            <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                <div>
                   
                    <div class=" bg-white aspect-square w-full bg-slate-100/70 rounded-2xl overflow-hidden mb-4 flex items-center justify-center p-2">
                        <img src="imagenes/<?= $item->getImagen(); ?>" 
                             alt="<?= $item->getNombre(); ?>" 
                             class="w-full h-full object-contain">
                    </div>
                    
                   
                    <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full inline-block">
                        <?= $item->getCategoria(); ?>
                    </span>
                    
                    
                    <h3 class="text-lg font-bold text-slate-800 mt-2">
                        <?= $item->getNombre(); ?>
                    </h3>

                    
                    <div class="flex justify-between items-center text-[14px] text-slate-400 pt-2 border-t border-slate-100/80 mt-3">
                        <span>Stock: <?= $item->getStock(); ?></span>
                        <span>Ingreso: <?= $item->getFechaIngreso(); ?></span>
                    </div>
                </div>

                
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-sm font-black text-slate-900">
                        $<?= number_format($item->getPrecio(), 0, ',', '.'); ?> <span class="text-sm font-normal text-slate-500">/día</span>
                    </span>
                   <a href="index.php?p=detalle&id=<?= $item->getId(); ?>" 
   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-m font-bold px-4 py-2.5 rounded-xl transition-colors shadow-sm">
    Ver detalle ★
</a>
                </div>
            </div> 

        <?php endforeach; ?>
    </div> 

</section>
