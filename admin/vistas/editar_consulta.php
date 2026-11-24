<?php
$id = (int) ($_GET['id'] ?? 0);
$consulta = Consulta::get_x_id($id);

if (!$consulta) {
    Alerta::add_alerta('danger', 'No se encontró la consulta solicitada.');
    header('Location: index.php?p=consultas');
    exit();
}

$motivos = Motivo::todosMotivos();
$productos = Producto::catalogo_completo();
?>

<?= Alerta::get_alertas(); ?>

<section class="py-8">
    <div class="max-w-3xl mx-auto p-6 bg-gradient-to-b from-white to-indigo-50/60 rounded-3xl border border-slate-200 shadow-md">
        <div class="flex flex-wrap justify-between items-center gap-3 mb-6 pb-3 border-b border-slate-100">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Editar Consulta #<?= $consulta->getIdConsulta(); ?></h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    Creada el <?= date('d/m/Y H:i', strtotime($consulta->getCreacionConsulta())); ?>
                </p>
            </div>
            <a href="index.php?p=consultas"
                class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
                ← Volver a consultas
            </a>
        </div>

        <form action="actions/editar_consulta_acc.php" method="POST" class="space-y-4">
            <input type="hidden" name="id" value="<?= $consulta->getIdConsulta(); ?>">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="nombre" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Nombre
                    </label>
                    <input type="text" id="nombre" name="nombre" required
                        value="<?= $consulta->getNombreConsulta(); ?>"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="apellido" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Apellido
                    </label>
                    <input type="text" id="apellido" name="apellido" required
                        value="<?= $consulta->getApellidoConsulta(); ?>"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Email
                    </label>
                    <input type="email" id="email" name="email" required
                        value="<?= $consulta->getEmailConsulta(); ?>"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="telefono" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Teléfono
                    </label>
                    <input type="text" id="telefono" name="telefono"
                        value="<?= $consulta->getTelefonoConsulta(); ?>"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="id_motivo" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Motivo
                    </label>
                    <select id="id_motivo" name="id_motivo"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                        <?php foreach ($motivos as $motivo): ?>
                            <option value="<?= $motivo->getIdMotivo(); ?>"
                                <?= (int) $consulta->id_motivo === (int) $motivo->getIdMotivo() ? 'selected' : ''; ?>>
                                <?= $motivo->getNombreMotivo(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="id_producto" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                        Insumo / Producto
                    </label>
                    <select id="id_producto" name="id_producto"
                        class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none">
                        <option value="">General (sin insumo)</option>
                        <?php foreach ($productos as $prod): ?>
                            <option value="<?= $prod->getId(); ?>"
                                <?= (int) $consulta->id_producto === (int) $prod->getId() ? 'selected' : ''; ?>>
                                <?= $prod->getNombre(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <label for="comentario" class="block text-xs font-semibold uppercase tracking-wide text-slate-500 mb-1">
                    Comentario
                </label>
                <textarea id="comentario" name="comentario" rows="4" required
                    class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-sm text-slate-800 focus:border-indigo-500 focus:outline-none"><?= $consulta->getComentarioConsulta(); ?></textarea>
            </div>

            <div class="flex justify-end gap-3 pt-3 border-t border-slate-100">
                <a href="index.php?p=consultas"
                    class="px-4 py-2 rounded-xl border border-slate-200 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold shadow-sm transition cursor-pointer">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
</section>