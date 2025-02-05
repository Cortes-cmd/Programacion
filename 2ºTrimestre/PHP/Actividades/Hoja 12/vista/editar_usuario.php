<?php
session_start();
error_reporting(E_ERROR);

require_once '../controlador/UsuariosController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_usuario'];
    $usuario = $_POST['Usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];


    $controller = new UsuariosController;
    $controller->ActualizarUsuario($id_cliente,$usuario,$password,$rol);

    if($_SESSION['usuario']== 'admin'|| $_SESSION['usuario']=='user'){

        header("Location: lista_socios.php");
        exit();

    } else{
        header("Location: ../index.php");
    }
       
}
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Socio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T"crossorigin="anonymous"/><meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Estilo.css">
</head>

<body>
<div class="container mt-5">
        <h1 class="text-center mb-4">Editar Socio</h1>
        <form action="editar_usuario.php" method="post">
            <div class="form-group">
                <label for="id_usuario">ID</label>
                <input type="text" name="id_usuario" id="id_usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input type="text" name="Usuario" id="Usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Password</label>
                <input type="text" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Rol">Rol</label>
                <input type="text" name="rol" id="rol" class="form-control" required>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn1-purple">Actualizar</button>
            </div>

            <link rel="stylesheet" href="Estilo.css">

        </form>
    </div>
</body>

</html>