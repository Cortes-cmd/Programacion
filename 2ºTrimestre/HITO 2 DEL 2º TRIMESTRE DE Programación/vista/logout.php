<?php
// Configuración de los reportes de errores para mostrar solo errores fatales
error_reporting(E_ERROR);
// Inicia la sesión 
session_start(); 
// Elimina todas las variables de sesión
session_unset(); 
// Destruye la sesión
session_destroy(); 
// Redirige al usuario a la página de inicio de sesión
header("Location: login.php");
// Finaliza el script
exit(); 
?>