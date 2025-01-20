<?php
error_reporting(E_ALL);

$array = ["manzana", "naranja", "pera"];

function buscarElemento($array, $palabra) {
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $palabra) {
            return "Resultado: " . $array[$i] . "\n";
        }
    }
    return "No se encontró la palabra: " . $palabra . "\n";
}

echo buscarElemento($array, "pera");
echo buscarElemento($array, "plátano");
?>