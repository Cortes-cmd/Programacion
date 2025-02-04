<?php
error_reporting(E_ALL);

function Pirámide (){

    $altura= readline("Dame la altura de la pirámide");

    for ($i=1; $i <=$altura ; $i++) {

        for ($n=1; $n <$altura - $i ; $n++) { 

            echo" ";

        }

        for ($n=1; $n <=$i; $n++) { 
            echo$n;
        }

        echo"\n";
    }
    
}
Pirámide()






?>
