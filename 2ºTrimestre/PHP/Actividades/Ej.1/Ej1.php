<?php

/**EJERCICIO 1*/ 


$n1= readline("Dame el primer número");

$n2= readline("Dame el primer número");

$consulta = readline("Dime qué operación deseas realizar \n");

if ($consulta == "suma"){
    suma($n1,$n2);

 } elseif ($consulta =="resta") {
    resta($n1,$n2);

 }  elseif($consulta =="multiplicacion") {
    multiplicacion($n1,$n2);

 }  elseif ($consulta == "division"){
    division ($n1,$n2);

}
    
   




function suma ($n1,$n2){

    echo "Inicializamos suma";
    $total = $n1 + $n2 ;

    echo "Producto de la suma: $total";
}





function resta ($n1, $n2){

    echo "Inicializamos resta";

    $total = $n1 + $n2;

    echo "Producto de la resta: $total";

}





function multiplicacion ($n1, $n2){

    echo "Inicializamos multiplicación";
    $total = $n1 * $n2;

    echo "Producto de la multiplicación: $total";

}





function division ($n1, $n2){

    echo "Inicializamos división";
    $total = $n1 / $n2;

    echo "Producto de la división: $total";

}

?>