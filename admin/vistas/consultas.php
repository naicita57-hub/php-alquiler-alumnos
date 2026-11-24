<?php
$consultas = Consulta::todasConsultas();
?>
<?= Alerta::get_alertas(); ?>

<section class="py-8">
<div class="p-4 bg-gradient-to-b from-white to-indigo-50/60 rounded-3xl border border-slate-200 shadow-md">
    <div class="flex flex-wrap justify-between items-center gap-3 mb-4 pb-3 border-b border-slate-100">
        <h2 class="text-xl font-bold text-slate-800">Administración de Consultas</h2>
        <span class="bg-indigo-100 text-indigo-700 font-bold px-4 py-2 rounded-xl text-sm whitespace-nowrap">
            Total: <?= count($consultas); ?>
        </span>
    </div>

    <div class="overflow-x-auto">
    <table class="w-full border-collapse text-left text-slate-700">
        <thead>
            <tr class="border-b border-slate-200">
                <th class="hidden sm:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Fecha</th>
                <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Nombre</th>
                <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Contacto</th>
                <th class="hidden md:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Motivo</th>
                <th class="hidden lg:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Insumo</th>
                <th class="hidden md:table-cell p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Comentario</th>
                <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($consultas)): ?>
            <tr>
                <td colspan="8" class="p-4 text-center text-slate-400">No hay consultas registradas.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($consultas as $item): ?>
                <tr class="border-b border-slate-100 hover:bg-indigo-50/50 transition">
                    <td class="hidden sm:table-cell p-2 text-slate-400">
                        <?= $item->getIdConsulta(); ?>
                    </td>
                    <td class="p-2 text-xs text-slate-500 whitespace-nowrap">
                        <?= date('d/m/Y H:i', strtotime($item->getCreacionConsulta())); ?>
                    </td>
                    <td class="p-2 font-semibold text-slate-800 min-w-[8rem]">
                        <?= $item->getNombreConsulta() . ' ' . $item->getApellidoConsulta(); ?>
                        <span class="block md:hidden text-xs font-normal text-slate-400">
                            <?= $item->nombre_motivo ?? ''; ?>
                        </span>
                    </td>
                    <td class="p-2 text-xs">
                        <div>
                            <a href="mailto:<?= $item->getEmailConsulta(); ?>" class="text-indigo-600 hover:underline">
                                <?= $item->getEmailConsulta(); ?>
                            </a>
                        </div>
                        <div class="text-slate-400">
                            <?= $item->getTelefonoConsulta(); ?>
                        </div>
                    </td>
                    <td class="hidden md:table-cell p-2 text-xs font-semibold text-slate-700 whitespace-nowrap">
                        <?= $item->nombre_motivo ?? ''; ?>
                    </td>
                    <td class="hidden lg:table-cell p-2 text-xs whitespace-nowrap">
                        <?php if (!empty($item->nombre_producto)): ?>
                            <span class="bg-indigo-50 text-indigo-700 font-bold px-2 py-0.5 rounded-full text-[10px]">
                                <?= $item->nombre_producto; ?>
                            </span>
                        <?php else: ?>
                            <span class="text-slate-400 italic">
                                General
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="hidden md:table-cell p-2 text-sm text-slate-500 max-w-xs" title="<?= $item->getComentarioConsulta(); ?>">
                        <p class="line-clamp-2"><?= $item->getComentarioConsulta(); ?></p>
                    </td>
                    <td class="p-2 text-center whitespace-nowrap">
                        <a href="index.php?p=editar_consulta&id=<?= $item->getIdConsulta(); ?>" class="mr-2 inline-block hover:scale-125 transition">✏️</a>
                        <a href="index.php?p=borrar_consulta&id=<?= $item->getIdConsulta(); ?>" class="inline-block hover:scale-125 transition">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    </div>
</div>
</section>