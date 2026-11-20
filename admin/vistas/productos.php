<?php 
$productos = Producto::catalogo_completo();
?>

<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Administración de Productos</h2>
        <a href="index.php?p=crear_producto" class="bg-blue-600 text-white px-3 py-1 rounded">
            + Crear Producto
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300 text-left">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Imagen</th>
                <th class="p-2 border">Insumo</th>
                <th class="p-2 border">Categoría</th>
                <th class="p-2 border">Carrera</th>
                <th class="p-2 border">Precio</th>
                <th class="p-2 border text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $item): ?>
            <tr class="border-b">
                <td class="p-2 border"><?= $item->getId(); ?></td> 
                <td class="p-2 border">
                    <img 
                        src="../assets/imagenes/<?= $item->getImagen(); ?>" 
                        alt="<?= $item->getNombre(); ?>" 
                        class="w-10 h-10 object-contain"
                        onerror="this.src='../assets/imagenes/logo-davinci-alquiler.webp'"
                    >
                </td>
                <td class="p-2 border font-semibold"><?= $item->getNombre(); ?></td>
                <td class="p-2 border"><?= $item->getCategoria(); ?></td>
                <td class="p-2 border"><?= $item->getCarrera(); ?></td>
                <td class="p-2 border">$<?= $item->getPrecio(); ?></td>
                <td class="p-2 border text-center">
                    <a href="index.php?p=editar_producto&id=<?= $item->getId(); ?>" class="mr-2">✏️</a>
                    <a href="index.php?p=borrar_producto&id=<?= $item->getId(); ?>">🗑️</a>
                </td>
            </tr> 
        <?php endforeach; ?>
        </tbody>
    </table>
</div>