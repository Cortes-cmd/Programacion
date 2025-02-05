<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/UsuariosController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['passwd'];
    $rol = $_POST['rol'];

    // Conectar a la base de datos
    $controller = new UsuariosController();
    $controller->VerificarUsuario($usuario, $password);

}
?>

<form action="login.php" method="POST">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br>

    <label for="passwd">Contraseña:</label>
    <input type="password" id="passwd" name="passwd" required><br>

    <input type="submit" value="Iniciar Sesión">
</form>
