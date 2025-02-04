<?php
error_reporting(E_ALL);

function Multiplicacion_Tabla ($numero){

    echo "Comenzamos multiplicando por los primeros 10 números ";


    echo"El número entre corcheas marca por el que se multiplicará\n";

    for ($i=1; $i <=10 ; $i++) { 

        $resultado[$i]= " $numero". " *"." $i"."---> " . $numero * $i;


        


    }
    echo "Resultados: \n";
    echo implode("\n", $resultado ). "\n" ;
}

$numero= readline("Dame un número, te diré sus multiplicaciones \n");
Multiplicacion_Tabla($numero);

?>