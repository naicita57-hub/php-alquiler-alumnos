<?php
require_once("../../functions/autoload.php");

$idConsulta = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);
$consulta   = Consulta::get_x_id($idConsulta);

if (!$consulta) {
    Alerta::add_alerta('danger', 'No se encontró la consulta.');
    header('Location: ../index.php?p=consultas');
    exit();
}

try {
    $consulta->delete();
    Alerta::add_alerta('success', 'Consulta eliminada correctamente.');
} catch (Exception $e) {
    Alerta::add_alerta('danger', 'No se pudo eliminar la consulta.');
}

header('Location: ../index.php?p=consultas');
exit();