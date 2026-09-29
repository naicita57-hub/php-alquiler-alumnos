<?php
    require_once "clases/Producto.php";
    $productos = Producto::catalogo_completo();
?>

<section>
    <div class= "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <h1>Catálogo de Insumos</h1>
        <p>Recordá que los precios son por día</p>
    </div>
<div>
    <?php foreach ($productos as $item):?>
    <div>
        <img src="imagenes/<?= $item->getImagen() ?>" alt="<?= $item->getNombre() ?>" > 
        </img>
        <span > $<?= $item->getCategoria() ?>
    </span>
   </div>

   <!-- datos del prodd--> 
<div>
        <h2> <?= $item->getNombre() ?> </h2>
        <div>
        <span>Stock: <?= $item->getStock() ?></span>
        <span>Fehca de ingreso: <?= $item-> getFechaIngreso() ?></span>
    </div>
</div>
</div>

<div>
    <div>
        <span>Precio por día: <?= $item-> getPrecio() ?> </span>
        <span></span>
        <a href="index.php?p=detalle&id=<?= $item->getId()?>">Ver más</a>

    </div>
</div>

 <?php endforeach; ?>
   

</section>