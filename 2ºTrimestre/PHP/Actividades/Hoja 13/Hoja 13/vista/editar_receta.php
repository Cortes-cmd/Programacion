<?php
require_once '../controlador/RecetasController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['ingredientes']) && isset($_POST['elaboracion'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $ingredientes = $_POST['ingredientes'];
    $elaboracion = $_POST['elaboracion'];

    // Crear una instancia del controlador
    $controller = new RecetasController();

    // Actualizar la receta en la base de datos
    $controller->editarReceta($id, $titulo, $ingredientes, $elaboracion);

    echo 'Receta actualizada exitosamente';
} else {
    // Obtener la receta actual para mostrar en el formulario
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new RecetasController();
        $receta = $controller->obtenerRecetas()->fetch_assoc();
        $titulo = $receta['titulo'];
        $ingredientes = $receta['ingredientes'];
        $elaboracion = $receta['elaboracion'];
    } else {
        echo 'Error: ID de receta no proporcionado.';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Receta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Receta</h2>
        <form action="editar_receta.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?>" required>
            </div>
            <div class="mb-3">
                <label for="ingredientes" class="form-label">Ingredientes</label>
                <textarea class="form-control" id="ingredientes" name="ingredientes" rows="5" required><?= $ingredientes ?></textarea>
            </div>
            <div class="mb-3">
                <label for="elaboracion" class="form-label">Elaboración</label>
                <textarea class="form-control" id="elaboracion" name="elaboracion" rows="5" required><?= $elaboracion ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Receta</button>
        </form>
    </div>
</body>
</html>