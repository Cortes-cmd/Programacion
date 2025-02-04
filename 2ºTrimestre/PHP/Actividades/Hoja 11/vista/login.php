<?php
session_start();

if ($_POST['usuario'] == 'admin' && $_POST['password'] == '1234') {
    $_SESSION['usuario'] = 'admin';
    header("Location: index.php");
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>

<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
