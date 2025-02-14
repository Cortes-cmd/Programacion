<?php
// eliminar_socio.php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/TareasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_tarea = $_GET['id'];
    $controller = new TareasController();
    $controller->EliminarTarea($id_tarea);
    header("Location: ../index.php");
    exit();
}
?>


