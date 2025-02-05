<?php
error_reporting(E_ERROR);
session_start();

if ($_SERVER['REQUEST_METHOD']== "POST"){
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        if($_POST['usuario']== "admin" && $_POST["password"]=="1234"){
            $_SESSION['usuario'] = 'admin';
            header("Location: lista_socios.php"); // Esto no se ejecuta bien y en vez de a lista, trata de llevarme a /vista/index

            exit();
        }else {

            header ("Location: login.php"); // Si me equivoco mantengo login
            exit(); 
        }
    }
}
?>

<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
