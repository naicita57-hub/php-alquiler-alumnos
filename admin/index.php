<?php

require_once "../config.php";

$seccion = isset($_GET['p']) ? $_GET['p'] : 'inicio';

$secciones_validas = ["inicio", "productos", "carreras", "usuarios", "crear_carrera", "editar_carrera", "borrar_carrera", "borrar_carrera_acc", "crear_producto", "editar_producto", "borrar_producto", "borrar_producto_acc"];
if (!in_array($seccion, $secciones_validas)) {
    $seccion = '404';
}

require_once "includes/head.php";
require_once "includes/header.php";
require_once "vistas/$seccion.php";
require_once "includes/footer.php";
