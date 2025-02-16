<?php
// Inicio la sesión
session_start();
// Regenero el ID de la sesión para mayor seguridad
session_regenerate_id(true); 
// Configuro el nivel de reporte de errores
error_reporting(E_ERROR);

// Incluyo el archivo del controlador de usuarios para la funcionalidad de agregar usuario
require_once '../controlador/UsuariosController.php'; 

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los valores del formulario
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $nombre = $_POST['nombre'];

    // Crea una nueva instancia del controlador de usuarios
    $controller = new UsuariosController();

    // Intenta agregar el nuevo usuario
    try {
        $controller->AgregarUsuario($email, $nombre, $password);
        // Redirecciona al índice después de agregar el usuario
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        // Si ocurre un error, muestra un mensaje de error
        error_log("Error al agregar el usuario: " . $e->getMessage()); 
        echo "Error al agregar el usuario: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Nuevo Usuario</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css"> <!-- Enlaza el archivo CSS -->
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->
</head>
<body>
    <div class="container mt-5">
        <!-- Formulario para agregar un nuevo usuario -->
        <h1 class="text-center mb-4">Alta de Nuevo Usuario</h1>
        <form action="alta_usuario.php" method="post">
            <!-- Campo del email para agregar un nuevo usuario -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <!-- Campo de la contraseña para agregar un nuevo usuario -->
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="passwd" id="passwd" class="form-control" required>
            </div>
            <!-- Campo del nombre para agregar un nuevo usuario -->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <!-- Checkbox para aceptar los términos de uso, con una referencia a la funcion del js -->
            <div class="form-group form-check">
                <input type="checkbox" name="terminos" id="checkbox" onchange="enabler()" class="form-check-input" required>
                <label for="aceptar_terminos" class="form-check-label">Acepto los términos de uso</label>
            </div>
            <!-- Botón para guardar el nuevo usuario -->
            <div class="d-flex justify-content-center align-items-center">
                <button id="button" type="submit" class="btn btn1-purple" disabled>Guardar</button>
            </div>
        </form>
    </div>
    <!-- Integración de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>