<?php
// Inicia la sesión
session_start(); 
// Regenera el ID de la sesión para mayor seguridad
session_regenerate_id(true); 
// Configura el nivel de reporte de errores para mostrar solo errores graves
error_reporting(E_ERROR); 

// Verifica si el usuario está autenticado
if ($_SESSION['usuario'] == 'user') {
    // Redirige a la lista de tareas si el usuario está autenticado
    header("Location: vista/lista_tareas.php");
} else {
    // Redirige a la página de inicio de sesión si el usuario no está autenticado
    header("Location: vista/login.php");
}

// Finaliza el script
exit();
?>