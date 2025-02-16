<?php
require_once '../controlador/TareasController.php'; // Incluye el archivo del controlador de tareas para la funcionalidad de actualizar estado

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los valores de estado e id_tarea desde el formulario
    $estado = $_POST['estado'];
    $id_tarea = $_POST['id_tarea'];

    // Crea una nueva instancia del controlador de tareas
    $controller = new TareasController();

    // Intenta actualizar el estado de la tarea
    try {
        $controller->actualizarEstado($id_tarea, $estado);
        echo "Estado actualizado con éxito. Estado: $estado, ID Tarea: $id_tarea"; // Mensaje de éxito
    } catch (Exception $e) {
        // Si ocurre un error, registra el error y muestra un mensaje de error
        error_log("Error al actualizar el estado de la tarea: " . $e->getMessage()); // Registro de errores
        echo "Error al actualizar el estado de la tarea: " . $e->getMessage();
    }
}
?>