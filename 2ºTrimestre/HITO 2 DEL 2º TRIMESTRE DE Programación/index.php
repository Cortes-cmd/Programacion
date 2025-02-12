<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

// Depuración: Mostrar los valores de las variables de sesión
echo "Usuario: " . (isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No establecido') . "<br>";
echo "Contraseña: " . (isset($_SESSION['passwd']) ? $_SESSION['passwd'] : 'No establecida') . "<br>";
echo "email: " . (isset($_SESSION['email']) ? $_SESSION['email'] : 'No establecido') . "<br>";


if ($_SESSION['usuario'] == 'user' ){


    header("Location: vista/lista_tareas.php");

} else{

    header("Location: vista/login.php");

}


?>