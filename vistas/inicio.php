<?php
$todasCarreras = Carrera::todasCarreras();

   $pasos = [
    [
        'titulo' => 'Seleccioná tu carrera',
        'texto'  => 'Elegí tu carrera en el <a href="index.php?p=inicio" class="text-indigo-600 hover:underline">inicio</a> para filtrar lo que te interesa ver. Podés elegir entre todas las carreras de la Escuela Da Vinci. También podés crearte un usuario para que tu/s carrera/s queden guardadas y los productos siempre estén filtrados.',
        'gif'    => 'paso1.gif',
    ],
    [
        'titulo' => 'Seleccioná el producto',
        'texto'  => 'Una vez dentro del catálogo, podes filtrar por categorías, o cambiar la carrera. Cuando encuentres un producto de tu interés, elegí ver más para poder consultar la disponibilidad de las fechas.',
        'gif'    => 'paso2.gif',
    ],
    [
        'titulo' => 'Consulta y pago',
        'texto'  => 'Una vez que realices la consulta, te va a llegar un mail donde vamos a pedirte que transfieras el monto correspondiente.',
        'gif'    => 'paso3.gif',
    ],
    [
        'titulo' => 'Acercate al departamento de alumnos el día de retiro',
        'texto'  => 'Por email te va a llegar un mail de confirmación con el monto que pagaste, los días, el horario de retiro y tu comprobante. Para retirar en el departamento de alumnos vas a mostrar el QR al final del email.',
        'gif'    => null,
    ],

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
                    class="mt-4 inline-block bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver
                    catálogo</a>
                <a href="index.php?p=inicio#como-alquilar"
                    class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">¿Cómo se alquila?</a>
            </div>
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-bold  text-center text-slate-800 mb-6 relative z-10"> Categorías por carrera</h2>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6  md:mx-20">
        <?php foreach ($todasCarreras as $carrera):?>
            <article
                class="bg-white/45 backdrop-blur-md p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                    <a href="index.php?p=productos&car<?= $carrera->getIdCarrera(); ?>=on">
                        <h3><?= $carrera->getNombreCarrera(); ?></h3>
                        <img src="assets/imagenes/<?= $carrera->getImagenCarrera(); ?>" alt="<?= $carrera->getNombreCarrera(); ?>"
                            class="object-cover w-full h-48 rounded-lg mt-4">
                    </a>
            </article>
        <?php endforeach; ?>
        </section>
    </div>

</div>

<section id="como-alquilar" class="como-funciona md:mx-20 container-pad py-16">

    <div class="relative z-10 text-center max-w-xl mx-auto mb-12">
        <h2 class="text-3xl font-black text-slate-800">¿Cómo alquilar?</h2>
        <p class="text-slate-600 text-sm md:text-[20px] mt-4">En cuatro pasos tenés tu equipo</p>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto bg-white/70 backdrop-blur-md border border-white/70 rounded-3xl shadow-sm p-6 md:p-12">
        <ol class="lista-pasos relative">

            <span class="absolute left-[17px] top-4 bottom-4 w-0.5 rounded-full bg-slate-200" aria-hidden="true"></span>
            <span class="linea-progreso absolute left-[17px] top-4 bottom-4 w-0.5 rounded-full bg-gradient-to-b from-pink-600 to-indigo-600" aria-hidden="true"></span>

            <?php foreach ($pasos as $i => $paso): ?>
            <li class="paso relative pl-14 pb-16 last:pb-0">

                <span class="paso-dot absolute left-0 top-0 flex h-9 w-9 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-sm font-bold text-slate-400">
                    <?= $i + 1; ?>
                </span>

                <h3 class="pt-1 text-xl md:text-2xl font-bold text-slate-800"><?= $paso['titulo']; ?></h3>

                <?php $tieneGif = !empty($paso['gif']); ?>
                <div class="paso-body grid gap-6 pt-4 <?= $tieneGif ? 'md:grid-cols-[2fr_3fr] items-start' : ''; ?>">
                    <p class="text-base md:text-lg leading-relaxed text-slate-700"><?= $paso['texto']; ?></p>
                    <?php if ($tieneGif): ?>
                        <img
                            src="assets/imagenes/<?= $paso['gif']; ?>"
                            alt="Demostración: <?= $paso['titulo']; ?>"
                            class="w-full h-auto max-h-[520px] object-cover rounded-3xl border border-slate-200 bg-white/60 shadow-sm transition-transform duration-300 ease-out hover:scale-105 hover:shadow-xl hover:z-10 relative"
                        >
                    <?php endif; ?>
                </div>

            </li>
            <?php endforeach; ?>

        </ol>
    </div>

    <div class="relative z-10 flex flex-col sm:flex-row justify-center items-center gap-4 mt-10">
        <a href="index.php?p=productos"
            class="inline-block bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Ver
            catálogo</a>
        <a href="index.php?p=inicio"
            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl shadow transition-colors">Elegir Carrera</a>
    </div>
</section>