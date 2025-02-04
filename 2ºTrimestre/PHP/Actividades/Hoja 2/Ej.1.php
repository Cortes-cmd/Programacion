<?php
 error_reporting(E_ALL);

    $Frase= readline("Dame la frase, te digo la cantidad de palabras en ella");

    $letras= 0;

    function contador_palabras ($Frase){

        for ($i=0; $i <= strlen($Frase) ; $i++) { 
             
            $letras = $i;
        }

        echo "Tu código tiene ".$letras. "letras";

        
    }
    

 contador_palabras($Frase)


?>
