<?php
require_once '../controlador/TareasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estado = $_POST['estado'];
    $id_tarea = $_POST['id_tarea'];

    $controller = new TareasController();
    $controller->actualizarEstado($id_tarea, $estado);

    echo "Estado: $estado, ID Tarea: $id_tarea"; // Agrega esta línea para depuración
}
?>