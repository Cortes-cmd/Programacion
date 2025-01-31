<?php
require_once '../controlador/ClientesController.php';

// En el GET proceso los datos del formulario, creo una nueva instancia de SociosController, y llamo a EliminarCliente
if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    $controller = new SociosController();
    $controller->EliminarCliente($id_cliente);
    header("Location: ../index.php");
    exit();
}
?>
