<?php
require_once "clases/Producto.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

$producto = $id ? Producto::producto_id($id) : null;
?>

<?php if ($producto != null) { ?>
<div class="flex flex-row">
    <div>
        <img src="imagenes/<?= $producto->getImagen() ?>" alt="<?= $producto->getNombre() ?>"></img>
    </div>
    <div>
        <h3>
            <?= $producto->getNombre(); ?>
        </h3>
        <pp>
            <?= $producto->getCategoria(); ?>
        </pp>
        <pp>
            <?= $producto->getDescripcion(); ?>
        </pp>
        <h2p>$
            <?= number_format($producto->getPrecio(), 2, ',', '.'); ?>
        </h2p>
        <p><strong>Stock disponible:</strong>
            <?= $producto->getStock(); ?> unidades
        </p>
        <p><strong>Año de ingreso:</strong>
            <?= $producto->getFechaIngreso(); ?>
        </p>

        <a href="?p=productos" p>Volver al catálogo</a>
    </div>
</div>
<?php } else { ?>
<div>
    <h2>Producto no encontrado</h2>
    <p>El equipo que estás buscando no existe en nuestro catálogo.</p>
    <a href="?p=productos">Ver todos los productos</a>
</div>
<?php } ?>