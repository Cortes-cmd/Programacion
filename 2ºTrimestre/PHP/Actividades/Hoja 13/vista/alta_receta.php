<?php


require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $titulo = $_POST['titulo'];
    $ingredientes = $_POST['ingredientes'];
    $elaboracion = $_POST['elaboracion'];

    // Instanciar el controlador de recetas
    $controller = new RecetasController();

    // Llamar al método para agregar la receta
    $controller->AgregarReceta($titulo, $ingredientes, $elaboracion);


}
