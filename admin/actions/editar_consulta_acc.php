<?php
require_once ("../../functions/autoload.php");

$postData   = $_POST;
$idConsulta = (int) ($postData['id'] ?? 0);
$idProducto = !empty($postData['id_producto']) ? (int) $postData['id_producto'] : null;
$idMotivo   = (int) ($postData['id_motivo'] ?? 0);

$consulta = Consulta::get_x_id($idConsulta);

if (!$consulta) {
    Alerta::add_alerta('danger', 'No se encontró la consulta.');
    header('Location: ../index.php?p=consultas');
    exit();
}

try {
    $consulta->update(
        trim($postData['nombre']),
        trim($postData['apellido']),
        trim($postData['email']),
        trim($postData['telefono']),
        $idProducto,
        $idMotivo,
        trim($postData['comentario'])
    );
    Alerta::add_alerta('success', 'Consulta actualizada correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo actualizar la consulta.');
}

header('Location: ../index.php?p=consultas');
exit();