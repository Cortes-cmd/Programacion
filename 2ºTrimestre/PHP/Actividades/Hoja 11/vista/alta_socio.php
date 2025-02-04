<?php
require_once '../controlador/SociosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $controller = new SociosController();
    $controller->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);

    // Redirecciona o muestra un mensaje de éxito

    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Socio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Alta de Nuevo Socio</h1>
        <form action="alta_socio.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Socio</button>
        </form>
    </div>
</body>
</html>





























?>