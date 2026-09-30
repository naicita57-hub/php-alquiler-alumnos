<?php
require_once "clases/Producto.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

$producto = $id ? Producto::producto_id($id) : null;
?>

<?php if ($producto != null) { ?>
<div class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm flex flex-row justify-items-center justify-center w-fit">

    <div class=" bg-white aspect-square bg-slate-100/70 rounded-2xl overflow-hidden flex p-2">
        <img src="imagenes/<?= $producto->getImagen() ?>" alt="<?= $producto->getNombre() ?>" class="bg-white/80 backdrop-blur-md rounded-3xl p-5 border border-slate-200/80 shadow-sm image-contain"></img>
    </div>
    <div class="content-evenly">
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