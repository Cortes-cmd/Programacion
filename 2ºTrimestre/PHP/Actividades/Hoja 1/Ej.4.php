<?php
error_reporting(E_ALL);

$número_aleatorio= rand(1,11);

$consulta=readline("¿Qué número estoy pensando?");

function adivinar ($numero_aleatorio, $consulta){

    while ($consulta != $numero_aleatorio){
        
        $consulta=readline("¿Qué número estoy pensando?");

        if ($consulta == $numero_aleatorio){

            echo "Correcto!!";
            
            break;
        }

    }
    return;

}

adivinar($número_aleatorio, $consulta)



?>