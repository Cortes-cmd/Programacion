<?php
require_once '../controlador/ClientesController.php';

// En el POST proceso los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $PlanBase = $_POST['PlanBase'];
    $PaquetesAdicionales = $_POST['Paquetes'];
    $PaquetesAdicionalesExtra = $_POST['PaquetesExtra']; 
    $Duracion = $_POST['Duracion']; 
    
    // Creo un objeto de la clase Socio para poder editar clientes
    $controller = new SociosController();
    if($PaquetesAdicionalesExtra=='paqueteExtra'){
        $resultado = $controller->ActualizarClientes($id_cliente,$nombre,$apellidos, $correo, $edad,$PlanBase,$PaquetesAdicionales,$Duracion);
    }else{
        $PaqueteF = $PaquetesAdicionales . "," . $PaquetesAdicionalesExtra;
        $resultado = $controller->ActualizarClientes($id_cliente,$nombre,$apellidos, $correo, $edad,$PlanBase,$PaqueteF,$Duracion);
    }

    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Cliente</h1>
    <!-- Formulario para editar al cliente con los mismos datos del alta Cliente, añadiendo el id  -->
    <form action="Editar_Cliente.php" method="POST" class="row g-3">
    <div class="col-md-12">
            <label for="nombre" class="form-label">ID</label>
            <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
        </div>
        <div class="col-md-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="col-md-12">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="col-md-12">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="col-md-12">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" required>
        </div>
        <!-- Selecciono los planes base, los paquetes adicionales, los extras, y la duración de la suscripción, utilizando las funciones JS para las variables-->
        <div class="col-md-12">
            <label for="PlanBase" class="form-label">Plan Base</label>
            <select class="form-select" id="PlanBase" name="PlanBase" onchange="mostrarPaquetesExtra()" required>
                <option value="" disabled selected>Plan Base</option>
                <option value="Basico">Basico (1 dispositivo)</option>
                <option value="Estandar">Estandar (2 dispositivo)</option>
                <option value="Premium">Premium (4 dispositivo)</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="Paquetes" class="form-label">Paquetes Adicionales</label>
            <select name="Paquetes" class="form-select" id="Paquetes" onchange="globalOpciones()" required>
                <option value="" disabled selected>Paquetes Adicionales</option>
                <option id="Deporte" value="Deporte">Deporte</option>
                <option value="Cine">Cine</option>
                <option value="Infantil">Infantil</option>
            </select>
        </div>
        <div class="col-md-12" >
            <label for="PaquetesExtra" id="PaquetesExtraL" class="form-label" hidden>Paquete adicional extra</label>
            <select name="PaquetesExtra" class="form-select" id="PaquetesExtra" hidden disabled onchange="desactivarOpciones()" >
                <option selected value="paqueteExtra">Paquetes Adicionales Extra</option>
                <option value="Deporte">Deporte</option>
                <option value="Deporte,Cine">Deporte,Cine</option>
                <option value="Cine">Cine</option>
                <option value="Cine,Infantil">Cine,Infantil</option>
                <option value="Infantil">Infantil</option>
                <option value="Infantil,Deporte">Infantil,Deporte</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="Duracion" class="form-label">Tipo de Suscripción</label>
            <select name="Duracion" class="form-select" id="Duracion" required>
                <option value="" selected disabled>Tipo de Duracion</option>
                <option value="Mensual">Mensual</option>
                <option value="Anual">Anual</option>
            </select>
        </div>
        <!-- Muestro coste de la suscripcion -->
        <div class="col-12">
            <div id="total">Total: €0.00</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
    <!-- Enlazo a JS -->
    <script src="../scripts/JS.js"></script>
</div>

<!-- Enlazo a bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>