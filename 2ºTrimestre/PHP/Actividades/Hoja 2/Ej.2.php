<?php
error_reporting(E_ALL);

$numeros=[];
function ordenar (){

    for ($i=0; $i <=10 ; $i++) { 
        $Numero_Aleatorio=rand(1,21);
    
        $numeros[$i] = $Numero_Aleatorio;
    
    }

    print_r($numeros);
    $longitud = count($numeros);
    
    for ($i = 0; $i < $longitud - 1; $i++) {
        for ($j = 0; $j < $longitud - $i - 1; $j++) {
            if ($numeros[$j] > $numeros[$j + 1]) {
                $temp = $numeros[$j];
                $numeros[$j] = $numeros[$j + 1];
                $numeros[$j + 1] = $temp;
            }
        }
    }
    print_r($numeros);





}

ordenar()
?>
