<?php
error_reporting(E_ALL);
function tablaMultiplicar ($n1){
    try{
        for ($i=1; $i <= 10; $i++) { 
            if ($n1 <= 0) {
                throw new Exception("El número debe ser un entero positivo.");
            }else{
            echo $n1 . "*" . $i . " = " . $n1 * $i . "\n";
        }
    }

    }
    catch (Exception $e){
        echo "Error: " . $e->getMessage();
    }
}
tablaMultiplicar(5);
tablaMultiplicar(-2); 

?>