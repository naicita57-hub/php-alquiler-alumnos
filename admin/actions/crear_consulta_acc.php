<?php
require_once("../../functions/autoload.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../index.php?p=contacto');
    exit();
}

$postData   = $_POST;
$idProducto = !empty($postData['id_producto']) ? (int) $postData['id_producto'] : null;
$idMotivo   = (int) ($postData['id_motivo'] ?? 0);

try {
    Consulta::insert(
        trim($postData['nombre']),
        trim($postData['apellido']),
        trim($postData['email']),
        trim($postData['telefono']),
        $idProducto,
        $idMotivo,
        trim($postData['comentario'])
    );

    $motivo   = Motivo::get_x_id($idMotivo);
    $producto = $idProducto ? Producto::get_x_id($idProducto) : null;
} catch (Exception $e) {
    // Mientras depurás: die($e->getMessage());
    die("No se pudo cargar la consulta.");
}

// Datos que muestra enviado.php (con el nombre del motivo, no el id)
$resumen = [
    'p'        => 'enviado',
    'nombre'   => $postData['nombre'],
    'apellido' => $postData['apellido'],
    'email'    => $postData['email'],
    'telefono' => $postData['telefono'],
    'motivo'   => $motivo ? $motivo->getNombreMotivo() : '',
];

if ($producto) {
    $resumen['equipo'] = $producto->getNombre();
}

$resumen['comentario'] = $postData['comentario'];

header('Location: ../../index.php?' . http_build_query($resumen));
exit();
