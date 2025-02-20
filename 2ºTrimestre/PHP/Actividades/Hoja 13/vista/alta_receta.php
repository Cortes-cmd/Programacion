<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['receta'])) {
    $receta = $_POST['receta'];

    // Dividir la receta en título, ingredientes y elaboración
    $partes = explode('<br><br>', $receta);
    if (count($partes) === 3) {
        $titulo = trim($partes[0]);
        $ingredientes = trim($partes[1]);
        $elaboracion = trim($partes[2]);

        // Crear una instancia del controlador
        $controller = new RecetasController();

        // Agregar la receta a la base de datos
        $controller->AgregarReceta($titulo, $ingredientes, $elaboracion);
        echo 'Receta agregada exitosamente';
    } else {
        echo 'Error: La receta no está en el formato correcto.';
    }
} else {
    echo 'Error: No se recibió ninguna receta.';
}
?>