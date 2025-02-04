<?php
require_once '../controlador/SociosController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $PlanBase = $_POST['plan_base'];
    $PaquetesAdicionales = isset($_POST['paquete']) ? $_POST['paquete'] : [];
    $Duracion = $_POST['duracion'];
    $controller = new SociosController;
    $controller->ActualizarClientes($id_cliente,$nombre,$apellido,$email,$edad,$PlanBase,$PaquetesAdicionales,$Duracion);

    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Socio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Socio</h1>
        <form action="editar_socio.php" method="post">
        <div class="form-group">
                <label for="id_cliente">ID</label>
                <input type="text" name="id_cliente" id="id_cliente" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" name="edad" id="edad" class="form-control"  required>
            </div>
            <div class="form-group">
                <label for="plan_base">Plan Base</label>
                <select name="plan_base" id="plan_base" class="form-control">
                    <option value="Basico" >Básico</option>
                    <option value="Estandar" >Estándar</option>
                    <option value="Premium" >Premium</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paquete">Selecciona el Paquete</label>
                <select name="paquete" id="paquete" class="form-control" required>
                    <option value="Deporte">Deporte</option>
                    <option value="Cine">Cine</option>
                    <option value="Infantil">Infantil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duracion">Duración de la Suscripción</label>
                <select name="duracion" id="duracion" class="form-control">
                    <option value="Mensual" >Mensual</option>
                    <option value="Anual" >Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
