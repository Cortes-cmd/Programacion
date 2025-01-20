<?php
require_once 'funciones.php';

$archivo = "../datos/proveedores.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $proveedores = leerProveedores($archivo);
    $proveedoresActualizados = array_filter($proveedores, function($proveedor) use ($id) {
        return $proveedor[0] != $id;
    });
    escribirProveedores($archivo, $proveedoresActualizados);
    header("Location: ../index.php?opcion=proveedores");
    
    exit();
    
   
} 
?>