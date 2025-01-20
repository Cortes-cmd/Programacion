<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];  
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $calle = $_POST['calle'];
    $salto = "\n";
    $linea = "$id,$nombre,$telefono,$correo,$calle,$salto";
    file_put_contents("../datos/proveedores.csv", $linea, FILE_APPEND);

    header("Location: ../index.php?opcion=proveedores");
    exit();
}
?>