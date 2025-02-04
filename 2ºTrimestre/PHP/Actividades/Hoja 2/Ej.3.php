<?php
error_reporting(E_ALL);

function Validacion (){

    $consulta_password= readline("Ingrese contraseña");

    if (preg_match("/[A-Z]/",$consulta_password) && preg_match("/[a-z]/",$consulta_password) && preg_match('/[0-9]/', $consulta_password)){

        echo"La contraseña es válida";
    }

    else {
        echo"No cumples con los requisitos para ingresar la contraseña";
    }





}

Validacion()


?>