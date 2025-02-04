<?php
require_once 'funciones.php'; // Importar las funciones
$archivo = "../datos/articulos.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $clientes = leerClientes($archivo);
    $clienteSeleccionado = null;

    // Buscar el cliente por su ID
    foreach ($clientes as $index => $cliente) {
        if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
            $clienteSeleccionado = $cliente;
            break;
        }
    }


}
$nombre = $_POST["nombre"] ?? null;
$precio = $_POST["precio"] ?? null;
$stock = $_POST["stock"] ?? null;

if ($id !== null && $nombre !== null && $precio !== null && $stock !== null) {
    $clientes = leerClientes($archivo);

    // Modificar el cliente correspondiente
    foreach ($clientes as $index => $cliente) {
        if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
            $clientes[$index] = [$id, $nombre, $precio, $stock]; // Actualizar los datos
            break;
        }
    }

    // Guardar los datos actualizados en el archivo CSV
    escribirClientes($archivo, $clientes);
    header("Location: ../index.php?opcion=articulos");
    exit();
}
?>