<?php
error_reporting(E_ALL);

function validarcorreo($email){
try{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Válida";
    } else {
        echo "La dirección de correo electrónico es inválida";
        ini_set('log_errors', 1);
        ini_set('error_log', 'errores.log');
        error_log("Esto es un mensaje de error personalizado.");
    }
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
}
validarcorreo("ig@gmail.com")
?>