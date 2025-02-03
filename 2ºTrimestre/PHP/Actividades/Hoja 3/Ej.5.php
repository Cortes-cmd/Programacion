<?php

error_reporting(E_ALL);

function convertirTemperatura($temp,$conversor){
    try{
        if ($conversor != "C" && $conversor != "F" ) {
            
            echo "La dirección de correo electrónico es inválida";
            ini_set('log_errors', 1);
            ini_set('error_log', 'errores.log');
            error_log("Esto es un mensaje de error personalizado.");
            throw new Exception("Error registrado en errores.log \n");
        }

        if($conversor == "F"){
            echo "La temperatura es: " .  ($temp * 9 / 5) + 32 . "ºF \n";
        }
        elseif($conversor == "C"){
            echo "La temperatura es: " .   ($temp - 32) * 5 / 9 . "ºC \n";
        }

    }
    catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }
}

convertirTemperatura(100, "C"); // Resultado: 37.78
convertirTemperatura(0, "F"); // Resultado: 32
convertirTemperatura(25, "X"); // Resultado: Error registrado en errores.log


?>