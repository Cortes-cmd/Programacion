<?php
require_once '../controlador/SociosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $edad = $_POST ['edad'];
    $plan_base= $_POST['plan_base'];
    $paquetes = isset($_POST['paquetes']) ? implode(",", $_POST['paquetes']) : "";
    $duracion = $_POST['duracion']; // Duración elegida entre "Mensual" o "Anual"

    $controller = new SociosController();
    $controller->AgregarCliente($nombre, $apellidos, $email, $edad, $plan_base, $paquetes, $duracion);

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
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Edad</label>
                <input type="text" name="edad" id="edad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="plan_base">Selecciona el Plan</label>
                <select name="plan_base" id="plan_base" class="form-control" required>
                    <option value="plan_basico">Plan Básico (1 dispositivo)</option>
                    <option value="plan_estandar">Plan Estándar (2 dispositivos)</option>
                    <option value="plan_premium">Plan Premium (4 dispositivos)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paquete">Selecciona el Paquete</label>
                <select name="paquete" id="paquete" class="form-control" required>
                    <option value="deporte">Deporte</option>
                    <option value="cine">Cine</option>
                    <option value="infantil">Infantil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duracion">Selecciona la Duración</label>
                <select name="duracion" id="duracion" class="form-control" required>
                    <option value="mensual">Mensual</option>
                    <option value="anual">Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Socio</button>
        </form>
    </div>
</body>
</html>





























?>