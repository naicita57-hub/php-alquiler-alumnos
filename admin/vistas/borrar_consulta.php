<?php
$id = (int) ($_GET['id'] ?? 0);
$consulta = Consulta::get_x_id($id);

if (!$consulta) {
    Alerta::add_alerta('danger', 'No se encontró la consulta solicitada.');
    header('Location: index.php?p=consultas');
    exit();
}
?>

<?= Alerta::get_alertas(); ?>

<section class="py-8">
    <div class="max-w-xl mx-auto p-6 bg-gradient-to-b from-white to-rose-50/40 rounded-3xl border border-slate-200 shadow-md">
        <div class="mb-4 pb-3 border-b border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">Eliminar Consulta #<?= $consulta->getIdConsulta(); ?></h2>
            <p class="text-sm text-slate-500 mt-1">
                ¿Estás segura de que querés eliminar esta consulta? Esta acción no se puede deshacer.
            </p>
        </div>

        <div class="bg-white/80 rounded-2xl border border-slate-200/80 p-4 space-y-2 text-sm text-slate-700 mb-6">
            <div>
                <span class="font-semibold text-slate-500">Nombre:</span>
                <span class="font-semibold text-slate-800">
                    <?= $consulta->getNombreConsulta() . ' ' . $consulta->getApellidoConsulta(); ?>
                </span>
            </div>
            <div>
                <span class="font-semibold text-slate-500">Email:</span>
                <span><?= $consulta->getEmailConsulta(); ?></span>
            </div>
            <div>
                <span class="font-semibold text-slate-500">Teléfono:</span>
                <span><?= $consulta->getTelefonoConsulta(); ?></span>
            </div>
            <div>
                <span class="font-semibold text-slate-500">Motivo:</span>
                <span><?= $consulta->nombre_motivo ?? ''; ?></span>
            </div>
            <div>
                <span class="font-semibold text-slate-500">Insumo:</span>
                <span><?= !empty($consulta->nombre_producto) ? $consulta->nombre_producto : 'General'; ?></span>
            </div>
            <div>
                <span class="font-semibold text-slate-500">Fecha:</span>
                <span><?= date('d/m/Y H:i', strtotime($consulta->getCreacionConsulta())); ?></span>
            </div>
            <div class="pt-2 border-t border-slate-100">
                <span class="font-semibold text-slate-500 block mb-1">Comentario:</span>
                <p class="text-slate-600"><?= $consulta->getComentarioConsulta(); ?></p>
            </div>
        </div>

        <form action="actions/borrar_consulta_acc.php" method="POST" class="flex justify-end gap-3">
            <input type="hidden" name="id" value="<?= $consulta->getIdConsulta(); ?>">
            <a href="index.php?p=consultas"
                class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                Cancelar
            </a>
            <button type="submit"
                class="px-5 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold shadow-sm transition cursor-pointer">
                Sí, eliminar
            </button>
        </form>
    </div>
</section>