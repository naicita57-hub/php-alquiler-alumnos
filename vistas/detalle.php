<?php
require_once "clases/Producto.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

$producto = $id ? Producto::producto_id($id) : null;
?>

<?php if ($producto != null) { ?>
<div class="flex flex-row bg-white/90 rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div>
        <img src="imagenes/<?= $producto->getImagen() ?>" alt="<?= $producto->getNombre() ?>"></img>
    </div>
    <div>
        <p>
            <?= $producto->getCategoria(); ?>
        </p>
        <h3 class="font-bold text-slate-800 text-lg leading-snug">
            <?= $producto->getNombre(); ?>
        </h3>
        <p>
            <?= $producto->getDescripcion(); ?>
        </p>
        <h2 class="text-m font-black text-green-600">Precio por día: $
            <?= number_format($producto->getPrecio(), 2, ',', '.'); ?>
        </h2>
        <p><strong>Stock disponible:</strong>
            <?= $producto->getStock(); ?> unidades
        </p>
        <p><strong>Año de ingreso:</strong>
            <?= $producto->getFechaIngreso(); ?>
        </p>

    </div>
</div>
<a href="?p=productos" p>Volver al catálogo</a>
<?php } else { ?>
<div>
    <h2>Producto no encontrado</h2>
    <p>El equipo que estás buscando no existe en nuestro catálogo.</p>
    <a href="?p=productos">Ver todos los productos</a>
</div>
<?php } ?>