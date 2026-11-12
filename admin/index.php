<?php
require_once "../config.php";

// Cargar las clases necesarias para el catálogo del admin
require_once "../clases/Conexion.php";
require_once "../clases/Producto.php";

// 1. Capturamos la vista solicitada (acepta 'v' o 'p') y fijamos 'productos_lista' como valor por defecto
$seccion = $_GET['v'] ?? $_GET['p'] ?? 'productos_lista';

// 2. Definimos ÚNICAMENTE las secciones que existen dentro de la carpeta admin/vistas/
$secciones_validas = [
    "productos_lista",
    "productos_crear",
    "productos_editar",
    "login"
];

// 3. Si la sección no existe en la lista, mostramos por defecto la lista de productos
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