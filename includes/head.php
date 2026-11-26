<?php
require_once "functions/autoload.php";

$secciones_validas = Secciones::secciones_validas();
$secciones_menu = Secciones::secciones_menu();

$seccion = isset($_GET['p']) ? $_GET['p'] : 'inicio';
if (!in_array($seccion, $secciones_validas)) {
    $vista = '404';
} else {
    $vista = $seccion;
}

$secciones = Secciones::secciones_del_sitio();
$title_seccion = "";
foreach ($secciones as $value) {
    if ($value->getVinculo() == $vista) {
        $title_seccion = $value->getTitle();
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DV x Día - <?= $title_seccion; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>