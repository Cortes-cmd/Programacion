<?php
// Inicia la sesión
session_start(); 
// Regenera el ID de la sesión para mayor seguridad
session_regenerate_id(true); 
// Configura el nivel de reporte de errores
error_reporting(E_ERROR); 

// Incluye el archivo del controlador de tareas para la funcionalidad de eliminar tarea
require_once '../controlador/TareasController.php'; 

// Verifica si la solicitud es de tipo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtiene el ID de la tarea
    $id_tarea = $_GET['id'];

    // Crea una nueva instancia del controlador de tareas
    $controller = new TareasController();

    // Intenta eliminar la tarea
    try {
        $controller->EliminarTarea($id_tarea);
        // Redirecciona al índice después de eliminar la tarea
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        // Si ocurre un error, registra el error y muestra un mensaje de error
        error_log("Error al eliminar la tarea: " . $e->getMessage()); 
        echo "Error al eliminar la tarea: " . $e->getMessage();
    }
}
?>

