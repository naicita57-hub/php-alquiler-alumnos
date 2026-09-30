<?php
require_once "clases/Producto.php";


$destacados = Producto::destacados();
?>
<div class="bg-formas-container py-10">

    <!-- Capa de luces??? -->
    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

    <!-- Contenido  normal -->
    <div class="relative z-10 container mx-auto px-4 space-y-8 ">

        <div class=" text-black rounded-3xl p-8 md:p-12 flex flex-col items-center gap-4">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">Alquiler de Equipos para estudiantes</h1>
            <p class="text-slate-600 text-base md:text-lg max-w-2xl">Accedé a herramientas, accesorios y más de las carreras disponibles en Da Vinci</p>
            <a href="index.php?p=productos" class="mt-2 inline-block bg-black-600 hover:bg-black-700 text-black font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver catálogo</a>
        </div>

        <div class=" ">
             <h2 class="text-2xl font-bold  text-center text-slate-800 mb-6"> Categorías por carrera</h2>
            <div class="flex flex-wrap gap-6 items-center justify-center">
                <div class="bg-white/45 backdrop-blur-md p-6 rounded-3xl border border-slate-200/80 shadow-sm p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow" >
                <h3 class="font-bold text-lg text-slate-800 mb-2">Cine y Nuevos Formatos</h3>
                <img src="imagenes/cine-portada.webp" alt="" class="object-cover w-full h-48 rounded-lg mb-4">
                <p></p>
               </div>
               <div class="bg-white/45 p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="font-bold text-lg text-slate-800 mb-2">Diseño Gráfico</h3>
                <img src="imagenes/diseno-portada.webp" alt="" class="object-cover w-full h-48 rounded-lg mb-4">
                <p></p>
                </div>
                 <div class="bg-white/45 p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="font-bold text-lg text-slate-800 mb-2">Programación</h3>
                <img src="imagenes/programacion-portada.webp" alt="" class="object-cover w-full h-48 rounded-lg mb-4">
                <p></p>
                </div>
                 <div class="bg-white/45 p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <h3 class="font-bold text-lg text-slate-800 mb-2">Videojuegos</h3>
                <img src="imagenes/videojuegos-portada.webp" alt="" class="object-cover w-full h-48 rounded-lg mb-4">
                <p></p>
                </div>
            </div>
        </div>

    </div>

</div>


<section class="py-8 space-y-6">

   
    <div class="text-center max-w-xl mx-auto">
        <h2 class="text-3xl font-black text-slate-800"> Productos Destacados</h2>
        <p class="text-slate-500 text-sm mt-1">
            Los insumos y equipos más elegidos para los entregables de la facu
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        
        <?php if (!empty($destacados)): ?>
            
            <?php foreach ($destacados as $producto): ?>
                
         
                <div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
                    <div>
                       
                        <div class="aspect-square w-full bg-white rounded-2xl overflow-hidden mb-4">
                            <img src="imagenes/<?= $producto->getImagen(); ?>" 
                                 alt="<?= $producto->getNombre(); ?>" 
                                 class="w-full h-full object-contain">
                        </div>
                        
                   
                        <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-full">
                            <?= $producto->getCategoria(); ?>
                        </span>
                        
                        
                        <h3 class="text-lg font-bold text-slate-800 mt-2">
                            <?= $producto->getNombre(); ?>
                        </h3>
                    </div>

                   
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-sm font-black text-slate-900">
                            $<?= number_format($producto->getPrecio(), 0, ',', '.'); ?> /día
                        </span>
                        <a href="index.php?p=detalle&id=<?= $producto->getId(); ?>" 
                           class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                            Ver detalle →
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php else: ?>
            
            <p class="col-span-full text-center text-slate-400 py-8">
                No hay productos destacados para mostrar en este momento.
            </p>
        <?php endif; ?>

    </div>

</section>
