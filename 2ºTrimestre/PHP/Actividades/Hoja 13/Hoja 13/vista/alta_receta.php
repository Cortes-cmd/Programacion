<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['receta'])) {
    $receta = $_POST['receta'];

    // Dividir la receta en título, ingredientes y elaboración
    $partes = explode('<br><br>', $receta);
    if (count($partes) === 3) {
        $titulo = trim(str_replace('Título: ', '', $partes[0]));
        $ingredientes = trim(str_replace('Ingredientes:', '', $partes[1]));
        $elaboracion = trim(str_replace('Elaboración:', '', $partes[2]));

        // Crear una instancia del controlador
        $controller = new RecetasController();

        // Agregar la receta a la base de datos
        $controller->AgregarReceta($titulo, $ingredientes, $elaboracion);
        echo json_encode(['success' => true, 'message' => 'Receta agregada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: La receta no está en el formato correcto.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error: No se recibió ninguna receta.']);
}
?>