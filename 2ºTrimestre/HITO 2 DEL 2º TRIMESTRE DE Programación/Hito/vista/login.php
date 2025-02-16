<?php
// Inicio la sesión
session_start();
// Regenera el ID de la sesión para mayor seguridad
session_regenerate_id(true); 
 // Configura el nivel de reporte de errores
error_reporting(E_ERROR);

// Incluye el archivo del controlador de usuarios para la funcionalidad de obtenención usuario por email
require_once '../controlador/UsuariosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene el valor del campo de email
    $email = $_POST['email'];
    // Obtiene el valor del campo de contraseña y elimina los espacios en blanco
    $password = trim($_POST['passwd']); 

    // Crea una nueva instancia del controlador de usuarios y obtiene el usuario por email
    $controller = new UsuariosController();
    $user = $controller->obtenerUsuarioPorEmail($email); 

    // Si el usuario existe y la contraseña es correcta, iniciamos sesión
    if ($user && $email == $user['email'] && password_verify($password, $user['passwd'])) {
        // Guardamos los datos del usuario en la sesión
        $_SESSION['usuario'] = 'user';
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['email'] = $user['email'];
        // Redirigimos a la página de tareas
        header("Location: lista_tareas.php");
        exit();
    } else {
        // Si el usuario no existe o la contraseña es incorrecta, mostramos un mensaje de error
        error_log("Error de inicio de sesión para usuario: " . $email);
        $error_message = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css"> <!-- Enlaza el archivo CSS -->
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->
</head>
<body class="login-body">
    <form action="login.php" method="POST" class="login-form">
        <h2 class="login-h2">Iniciar Sesión</h2>
        <!-- Campo del email para iniciar sesión -->
        <div class="login-user">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <!-- Campo de la contraseña para iniciar sesión -->
        <div class="login-passwd">
            <label for="passwd">Contraseña</label>
            <input type="password" id="passwd" name="passwd" required>
        </div>
        <!-- Botón de inicio de sesión -->
        <div>
            <button class="login-btn" type="submit">Iniciar Sesión</button>
        </div>
        <!-- Enlace para registrarse -->
        <div>
            <a href="alta_usuario.php" class="btn login-btn1">Registrarse</a>
        </div>
        <!-- Muestra un mensaje de error si existe -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger mt-3">
                <?= $error_message ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>