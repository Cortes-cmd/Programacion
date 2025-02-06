<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/UsuariosController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['passwd'];
    $rol = $_SESSION['rol'];

    echo "Usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'No establecido') . "<br>";
    echo "Contraseña: " . (isset($_SESSION['passwd']) ? $_SESSION['passwd'] : 'No establecida') . "<br>";
    echo "Rol: " . (isset($_SESSION['rol']) ? $_SESSION['rol'] : 'No establecido') . "<br>";

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
