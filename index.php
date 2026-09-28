<?php
$seccion = isset($_GET['p']) ? $_GET['p'] : 'home';

$secciones_validas = ["inicio", "productos", "quienes-somos"];
if (!in_array($seccion, $secciones_validas)) {
    $seccion = '404';
}

require_once "includes/head.php";
require_once "includes/header.php";
require_once "includes/footer.php";
