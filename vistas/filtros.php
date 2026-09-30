<?php
require_once "clases/Producto.php";
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';
    
$agendaPorPais = Producto::catalogo_carrera($filtro);

$categoria = Producto::todosLoscategoria();

?>
<h1>Filtro por <?= $filtro;?></h1>

<ul>
    <?php 
        foreach($categoria as $c){
    ?>
    <li class="nav-item">
        <a class="nav-link<?= ($c == $filtro) ? " active" : "";?>" <?= ($c == $filtro) ? 'aria-current="page"' : "";?> href="?p=filtro&filtro=<?= $c; ?>"><?= $c; ?></a>
    </li>
    <?php }?>


</ul>

<div>
            <?php foreach($agendaPorPais as $personita){ 
                echo Producto::cardPerfilProducto($personita);
            } ?>
        </div>
        <div>
            <p>Volver a <a href="?p=prodcuto">Producto</a></p>
        </div>