<?php

error_reporting(E_ALL);


function calculadora($n1,$n2){
try {
    $opcion = readline("Opciones: \n1. Suma 2. Resta 3. Multiplicacion 4. División >");
    switch ($opcion){
        case 1:
            return $n1+$n2;
        case 2:
            return $n1 - $n2;            
        case 3:
            return $n1 * $n2;
        case 4:
            if ($n2 == 0){
                throw new Exception("No se puede dividir entre cero. ");
            }else{
                return $n1 / $n2;
            }
    }
    

}
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
}
$n1 = readline("Primer numero: ");
$n2 = readline("Segundo numero: ");

$resultado = calculadora($n1,$n2);
echo $resultado
?>