VerificarUsuario<?php
session_start(); // Inicia la sesión
session_regenerate_id(true); // Regenera el ID de la sesión para mayor seguridad
error_reporting(E_ERROR); // Configura el nivel de reporte de errores

require_once '../controlador/TareasController.php'; // Incluye el archivo del controlador de tareas para la funcionalidad de agregar tarea

// Verifica si el usuario está autenticado
if ($_SESSION['usuario'] == 'user') {
    // Usuario autenticado
} else {
    // Redirecciona al índice si el usuario no está autenticado
    header("Location: ../index.php");
    exit();
}

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los valores del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $email = $_SESSION['email'];

    // Crea una nueva instancia del controlador de tareas
    $controller = new TareasController();

    // Intenta agregar la nueva tarea
    try {
        $controller->AgregarTarea($email, $titulo, $descripcion, $estado);
        // Redirecciona al índice después de agregar la tarea
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        // Si ocurre un error, registra el error y muestra un mensaje de error
        error_log("Error al agregar la tarea: " . $e->getMessage()); // Registro de errores
        echo "Error al agregar la tarea: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Nueva Tarea</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css"><!-- Enlaza el archivo CSS -->
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Alta de Nueva Tarea</h1>
        <form action="alta_tarea.php" method="post">
            <!-- Campo del titulo para agregar una nueva tarea -->
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <!-- Campo de descripción de la tarea -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <!-- Campo de estado de la tarea -->
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" onchange="actualizarEstado(this.value)">
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Bloqueada">Bloqueada</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>
            <!-- Botón para guardar la tarea -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn1-purple">Guardar</button>
            </div>
        </form>
    </div>
    <!-- Integración de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>