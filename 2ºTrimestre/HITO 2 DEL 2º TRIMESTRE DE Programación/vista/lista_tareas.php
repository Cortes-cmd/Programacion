<?php
// Inicio la sesión
session_start();
// Regenera el ID de la sesión para mayor seguridad
session_regenerate_id(true);
// Configura el nivel de reporte de errores
error_reporting(E_ERROR); 

// Incluye el archivo del controlador de tareas para la funcionalidad de listar tareas
require_once '../controlador/TareasController.php'; 

// Crea una nueva instancia del controlador de tareas
$controller = new TareasController(); 

// Obtiene el email del usuario desde la sesión
$email = $_SESSION['email']; 

// Obtiene las tareas del usuario por email
$tareas = $controller->ListarTareasPorEmail($email); 
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
    <link rel="stylesheet" href="../vista/Estilo.css"><!-- Enlaza el archivo CSS -->
    <script src="JS.js"></script> <!-- Enlaza el archivo JavaScript -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Gestión de Tareas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Botón de cerrar sesión -->
                <li class="ml-auto">
                    <a class="nav-link btn btn2 d-flex text-white" href="logout.php">Cerrar Sesión</a>
                </li>
                <!-- Bienvenida al usuario -->
                <li class="nav-item-Bienvenida">
                    <h5 class="h5-Bienvenida">Bienvenido <?php echo $_SESSION['nombre']; ?>!</h5>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Tabla de tareas registradas -->
        <h1 class="text-center mb-4">Tareas Registradas</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Email</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre las tareas y muestra los datos en la tabla -->
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['email'] ?></td>
                        <td><?= $tarea['titulo'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td>
                            <!-- En el caso del estado un desplegable, y relaciono con la función js para actualizar el campo en el momento -->
                            <select class="form-control" onchange="actualizarEstado(<?= $tarea['id_tarea'] ?>, this.value)">
                                <!-- En el caso de que el estado sea igual a Pendiente, se selecciona esa opción, y viceversa -->
                                <option value="Pendiente" <?= $tarea['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                <option value="En proceso" <?= $tarea['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                                <option value="Bloqueada" <?= $tarea['estado'] == 'Bloqueada' ? 'selected' : '' ?>>Bloqueada</option>
                                <option value="Finalizada" <?= $tarea['estado'] == 'Finalizada' ? 'selected' : '' ?>>Finalizada</option>
                            </select>
                        </td>
                        <td>
                            <!-- Botón para editar la tarea -->
                            <button class="btn btn-primary-1 mb-3">
                                <a href="eliminar_tarea.php?id=<?= $tarea['id_tarea'] ?>">Eliminar</a>
                            </button>
                        </td>
                    </tr>
                    <!-- Fin del foreach -->
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Botón para agregar una nueva tarea -->
        <div class="text-center">
            <a href="alta_tarea.php" class="btn btn3">Agregar nueva tarea</a>
        </div>
    </div>
</body>
</html>