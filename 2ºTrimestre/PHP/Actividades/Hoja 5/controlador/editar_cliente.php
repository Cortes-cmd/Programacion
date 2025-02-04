<?php
require_once 'funciones.php'; // Importar las funciones
$archivo = "../datos/clientes.csv";
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
$correo = $_POST["correo"] ?? null;
$telefono = $_POST["telefono"] ?? null;

if ($id !== null && $nombre !== null && $correo !== null && $telefono !== null) {
    $clientes = leerClientes($archivo);

    // Modificar el cliente correspondiente
    foreach ($clientes as $index => $cliente) {
        if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
            $clientes[$index] = [$id, $nombre, $correo, $telefono]; // Actualizar los datos
            break;
        }
    }

    // Guardar los datos actualizados en el archivo CSV
    escribirClientes($archivo, $clientes);
    header("Location: ../index.php?opcion=clientes");
    exit();
}
?>