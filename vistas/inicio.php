<?php
require_once "clases/Producto.php";

?>
<?php
$pasos = [
    ['titulo' => 'Seleccioná tu carrera',
     'texto'  => 'Elegí tu carrera en el <a href="index.php?p=inicio" class="text-indigo-600 hover:underline">inicio</a> para filtrar lo que te interesa ver. Podés elegir entre todas las carreras de la Escuela Da Vinci. También podés crearte un usuario para que tu/s carrera/s queden guardadas y los productos siempre estén filtrados.',
     'media'  => true],
    ['titulo' => 'Seleccioná el producto y la fecha deseada',
     'texto'  => 'Texto del paso 2.',
     'media'  => true],
    ['titulo' => 'Realizá el pago',
     'texto'  => 'Texto del paso 3.',
     'media'  => true],
    ['titulo' => 'Acercate al departamento de alumnos el día de retiro',
     'texto'  => 'Texto del paso 4.',
     'media'  => false],
];
$total = count($pasos);
?>
<div class="bg-formas-container py-10 container-pad">


    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>


    <div class="relative z-10 container mx-auto px-4 space-y-8 ">

        <div class=" text-black rounded-3xl text-center p-6 md:p-12 flex flex-col items-center gap-4">
            <h2 class="text-3xl md:text-5xl font-extrabold leading-tight">Alquiler de Equipos para estudiantes</h2>
            <p class="text-slate-600 text-base md:text-lg max-w-2xl">Accedé a herramientas, accesorios y más de las
                carreras disponibles en Da Vinci</p>

            <div class=" col-1 md:flex gap-6">
                <a href="index.php?p=productos"
                    class="mt-4 inline-block bg-pink-600 hover:bg-black-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver
                    catálogo</a>
                <a href="index.php?p=inicio#como-alquilar"
                    class="mt-4 inline-block bg-indigo-600 hover:bg-black-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Cómo alquilo?</a>
            </div>
        </div>
    </div>


    <div>
        <h2 class="text-2xl font-bold  text-center text-slate-800 mb-6 relative z-10"> Categorías por carrera</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6  md:mx-20">

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=cine-y-nf">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Cine y Nuevos Formatos</h3>
                        <img src="imagenes/cine-portada.webp" alt="Cine y Nuevos Formatos"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=diseno-grafico">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Diseño Gráfico</h3>
                        <img src="imagenes/diseno-portada.webp" alt="Diseño Gráfico"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=programacion">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Programación</h3>
                        <img src="imagenes/programacion-portada.webp" alt="Programación"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>

                <article
                    class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&filtro=videojuegos">
                        <h3 class="font-bold text-lg text-slate-800 mb-2">Videojuegos</h3>
                        <img src="imagenes/videojuegos-portada.webp" alt="Videojuegos"
                            class="object-cover w-full h-48 rounded-lg">
                    </a>
                </article>
        </div>
    </div>

</div>
</section>


    <section id="como-alquilar" class="como-funciona md:mx-20 container-pad py-16">

   
    <div class="relative z-10 text-center max-w-xl mx-auto mb-12">
        <h2 class="text-3xl font-black text-slate-800">¿Cómo alquilar?</h2>
         <p class="text-slate-500 text-sm md:text-[20px] mt-4">En cuatro pasos tenés tu equipo</p>
   
    </div>

    <ol class="lista-pasos relative max-w-3xl mx-auto">

        <!-- Riel gris y línea que se llena con el scroll -->
        <span class="absolute left-[17px] top-4 bottom-4 w-0.5 rounded-full bg-slate-200" aria-hidden="true"></span>
        <span class="linea-progreso absolute left-[17px] top-4 bottom-4 w-0.5 rounded-full bg-gradient-to-b from-pink-600 to-indigo-600" aria-hidden="true"></span>

        <?php foreach ($pasos as $i => $paso): ?>
        <li class="paso relative pl-14 pb-16 last:pb-0">

            <span class="paso-dot absolute left-0 top-0 flex h-9 w-9 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-sm font-bold text-slate-400">
                <?= $i + 1; ?>
            </span>

            <h3 class="pt-1 text-lg font-bold text-slate-800"><?= $paso['titulo']; ?></h3>

            <div class="paso-body grid gap-6 pt-4 <?= $paso['media'] ? 'md:grid-cols-2' : ''; ?>">
                <p class="text-sm leading-relaxed text-slate-600"><?= $paso['texto']; ?></p>
                <?php if ($paso['media']): ?>
                <div class="flex h-44 items-center justify-center rounded-3xl border border-slate-200 bg-white/60 backdrop-blur-md font-bold text-slate-800 shadow-sm">
                    gif demostrativo
                </div>
                <?php endif; ?>
            </div>

        </li>
        <?php endforeach; ?>

    </ol>
</section>
