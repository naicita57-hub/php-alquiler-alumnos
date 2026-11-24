<?php
$consultas = Consulta::todasConsultas();
?>

<section class="py-8">
    <div class="p-4 bg-gradient-to-b from-white to-indigo-50/60 rounded-3xl border border-slate-200 shadow-md">
        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Administración de Consultas</h2>
        </div>
        <span class="bg-indigo-100 text-indigo-700 font-bold px-3 py-1 rounded-lg text-xs">
            Total: <?= count($consultas); ?>
        </span>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left text-slate-700">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">ID</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Fecha</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Nombre</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Contacto</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Motivo</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Insumo</th>
                        <th class="p-2 text-xs font-semibold uppercase tracking-wide text-slate-500">Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($consultas)): ?>
                        <tr>
                            <td colspan="7" class="p-4 text-center text-slate-400">No hay consultas registradas.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($consultas as $item): ?>
                            <tr class="border-b border-slate-100 hover:bg-indigo-50/50 transition">
                                <td class="p-2 text-slate-400">
                                    <?= $item->getIdConsulta(); ?>
                                </td>
                                <td class="p-2 text-xs text-slate-500 whitespace-nowrap">
                                    <?= date('d/m/Y H:i', strtotime($item->getCreacionConsulta())); ?>
                                </td>
                                <td class="p-2 font-semibold text-slate-800">
                                    <?= $item->getNombreConsulta() . ' ' . $item->getApellidoConsulta(); ?>
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
                                <td class="p-2 text-xs font-semibold text-slate-700">
                                    <?= $item->nombre_motivo; ?>
                                </td>
                                <td class="p-2 text-xs">
                                    <?php if (!empty($item->nombre_producto)): ?>
                                    <span class="bg-indigo-50 text-indigo-700 font-bold px-2 py-0.5 rounded-full text-[10px]">
                                        <?= $item->nombre_producto ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-slate-400 italic">
                                        General
                                    </span>
                                <?php endif; ?>
                                </td>
                                <td class="p-2 text-xs max-w-xs truncate" title="<?= $item->getComentarioConsulta(); ?>">
                                    <?= $item->getComentarioConsulta(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>