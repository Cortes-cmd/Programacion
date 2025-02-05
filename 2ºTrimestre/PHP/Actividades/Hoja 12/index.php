<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

// Depuración: Mostrar los valores de las variables de sesión
echo "Usuario: " . (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'No establecido') . "<br>";
echo "Contraseña: " . (isset($_SESSION['passwd']) ? $_SESSION['passwd'] : 'No establecida') . "<br>";


if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin' && isset($_SESSION['passwd']) && $_SESSION['passwd'] == '1234') {

   header("Location: vista/lista_usuarios.php");
    exit();
} elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'ACD' && isset($_SESSION['passwd']) && $_SESSION['passwd'] == '56789') {

    header("Location: vista/lista_socios.php");
    exit();
} else {
    echo "Aun necesitas identificarte!";
    header("Location: vista/login.php");
    exit();
}
?>