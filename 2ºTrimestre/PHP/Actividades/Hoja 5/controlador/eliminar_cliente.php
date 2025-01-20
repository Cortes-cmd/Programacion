<?php
require_once 'funciones.php';

$archivo = "../datos/clientes.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $clientes = leerClientes($archivo);
    $clientesActualizados = array_filter($clientes, function($cliente) use ($id) {
        return $cliente[0] != $id;
    });
    escribirClientes($archivo, $clientesActualizados);
    header("Location: ../index.php?opcion=clientes");
    
    exit();
    
   
} 
?>