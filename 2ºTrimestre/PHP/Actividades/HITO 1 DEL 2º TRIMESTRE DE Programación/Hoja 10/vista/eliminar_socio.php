<?php
// eliminar_socio.php
require_once '../controlador/SociosController.php';

if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];
    $controller = new SociosController();
    $controller->EliminarCliente($id_cliente);
    header("Location: ../index.php");
    exit();
}
?>
