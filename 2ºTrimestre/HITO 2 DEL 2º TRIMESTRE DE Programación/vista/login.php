<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/UsuariosController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $passwrd = trim($_POST['passwd']); // Elimina espacios en blanco innecesarios

    $controller = new UsuariosController();
    $user = $controller->obtenerUsuarioPorEmail($email);


    //Si el usuario existe y la contraseña es correcta iniciamos sesión
    if ($user && $email == $user['email'] && password_verify($password, $user['passwd'])) {
        //Guardamos los datos del usuario en la sesión
        $_SESSION['usuario'] = 'user';
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['email'] = $user['email'];
        //Redirigimos a la página de inicio
        header("Location: lista_tareas.php");
        exit();
    } else {
        //Si el usuario no existe o la contraseña es incorrecta mostramos un mensaje de error
        error_log("Error de inicio de sesión para usuario: " . $usuariolog);
        $error_message = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css">
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->

</head>

<body class="login-body">
    <form action="login.php" method="POST" class="login-form">
        <h2 class="login-h2">Iniciar Sesión</h2>

        <div class="login-user">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="login-passwd">
            <label for="passwd">Contraseña</label>
            <input type="password" id="passwd" name="passwd" required>
        </div>

        <div>
         <button class="login-btn" type="submit">Iniciar Sesión</button>
        </div>

        <div>
         <a href="alta_usuario.php" class="btn login-btn1">Registrarse</a>
        </div>
    </form>

</body>