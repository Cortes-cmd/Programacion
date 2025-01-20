<?php
function leerClientes($archivo) {
    $clientes = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $clientes[] = $data;
        }
        fclose($handle);
    }
    return $clientes;
}

function escribirClientes($archivo, $clientes) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($clientes as $cliente) {
            fputcsv($handle, $cliente);
        }
        fclose($handle);
    }
}

function leerArticulos($archivo) {
    $articulos = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $articulos[] = $data;
        }
        fclose($handle);
    }
    return $articulos;
}

function escribirArticulos($archivo, $articulos) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($articulos as $articulo) {
            fputcsv($handle, $articulo);
        }
        fclose($handle);
    }
}

function leerProveedores($archivo) {
    $proveedores = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $proveedores[] = $data;
        }
        fclose($handle);
    }
    return $proveedores;
}

function escribirProveedores($archivo, $proveedores) {
    if (($handle = fopen($archivo, "w")) !== false) {
        foreach ($proveedores as $proveedor) {
            fputcsv($handle, $proveedor);
        }
        fclose($handle);
    }
}
?>