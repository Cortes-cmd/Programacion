<?php
    error_reporting(E_ALL);

    $numero= readline("Dame un número, te diré si es primo o no");

    Primo($numero);

    function Primo ($numero){

        if ($numero <=1){

            echo "El número no es primo";
            return;
        }

        for ($i=2; $i <=sqrt($numero) ; $i++) {

          
                
            if ($numero %$i == 0){

                echo "El número no es primo";
                return;
            }   
        }

       echo"El número es primo";

      
    }




?>