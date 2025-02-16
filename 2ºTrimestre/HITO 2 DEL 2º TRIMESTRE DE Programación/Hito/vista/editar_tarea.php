<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/TareasController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarea = $_POST['id_tarea'];
    $email = $_POST['email'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];


    $controller = new TareasController;
    $controller->ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea);

    if($_SESSION['usuario']=='user'){

        header("Location: lista_tareas.php");
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
    <title>Listado de Tareas</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css">
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->
</head>

<body>
<div class="container mt-5">
        <h1 class="text-center mb-4">Editar Tarea</h1>
        <form action="editar_tarea.php" method="post">
         <div class="form-group">
                <label for="id">Id_Tarea</label>
                <input type="text" name="id_tarea" id="id_tarea" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" onchange="actualizarEstado(this.value)">
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Bloqueada">Bloqueada</option>
                    <option value="Finalizada">Finalizada</option>
                </select>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn1-purple">Guardar</button>
            </div>
        </form>
    </div>
</body>

</html>