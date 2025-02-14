<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/TareasController.php';
$controller = new TareasController(); 

$email = $_SESSION['email']; 


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
    <link rel="stylesheet" href="../vista/Estilo.css">
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
                <?php if ($_SESSION['rol'] === 'admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="lista_usuarios.php">Lista de Usuarios</a>
                    </li>
                <?php } ?>
                <li class="ml-auto">
                    <a class="nav-link btn btn2 d-flex text-white" href="logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item-Bienvenida">
                    <h5 class="h5-Bienvenida">Bienvenido <?php echo $_SESSION['nombre']; ?>!</h5>
                </li>
                <p><?//php// echo $_SESSION['email']; ?></p>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
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
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['email'] ?></td>
                        <td><?= $tarea['titulo'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td>
                            <select class="form-control" onchange="actualizarEstado(<?= $tarea['id_tarea'] ?>, this.value)">
                                <option value="Pendiente" <?= $tarea['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                                <option value="En proceso" <?= $tarea['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                                <option value="Bloqueada" <?= $tarea['estado'] == 'Bloqueada' ? 'selected' : '' ?>>Bloqueada</option>
                                <option value="Finalizada" <?= $tarea['estado'] == 'Finalizada' ? 'selected' : '' ?>>Finalizada</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary-1 mb-3">
                                <a href="eliminar_tarea.php?id=<?= $tarea['id_tarea'] ?>">Eliminar</a>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="alta_tarea.php" class="btn btn3">Agregar nueva tarea</a>
        </div>
    </div>
</body>

</html>