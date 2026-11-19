<?php
require_once "../config.php";

$seccion = isset($_GET['p']) ? $_GET['p'] : 'inicio';

$secciones_validas = ["inicio", "productos", "carreras", "usuarios", "crear_carrera", "editar_carrera", "borrar_carrera", "borrar_carrera_acc", "crear_producto", "editar_producto", "borrar_producto", "borrar_producto_acc"];
if (!in_array($seccion, $secciones_validas)) {
    $seccion = 'productos_lista';
}

// Estructura visual del Admin
require_once "includes/head.php";
require_once "includes/header.php";
?>

<main class="max-w-6xl mx-auto px-4 py-8">
  <?php
    $archivo_vista = "vistas/$seccion.php";
    if (file_exists($archivo_vista)) {
        require_once $archivo_vista;
    } else {
        echo "<div class='p-4 text-red-600 bg-red-50 border border-red-200 rounded-xl'>La vista solicitada no existe en el panel de administración.</div>";
    }
  ?>
</main>

<?php
require_once "includes/footer.php";
?>