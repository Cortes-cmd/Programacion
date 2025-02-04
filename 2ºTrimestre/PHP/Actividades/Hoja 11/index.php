<?php
if (isset($_SESSION['usuario'])&& $_SESSION['rol']== 'admin') {
    echo "Bienvenido!". $_SESSION["usuario"]. "con rol". $_SESSION['rol'];
    header("Location: vista/lista_socios.php");
    exit();
}else
    echo "Aun necesitas identificarte!";
header("Location: vista/login.php");
exit();
?>
