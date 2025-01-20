<?php
require_once 'funciones.php';

$archivo = "../datos/articulos.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $articulos = leerArticulos($archivo);
    $articulosActualizados = array_filter($articulos, function($articulo) use ($id) {
        return $articulo[0] != $id;
    });
    escribirArticulos($archivo, $articulosActualizados);
    header("Location: ../index.php?opcion=articulos");
    
    exit();
    
   
} 
?>