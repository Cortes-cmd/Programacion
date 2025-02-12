<?php
session_start();
session_regenerate_id(true);
error_reporting(E_ERROR);

require_once '../controlador/TareasController.php';
$controller = new TareasController();
$tareas = $controller->listarTareas();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZwv-model-vue1T" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../vista/Estilo.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Gestión de Tareas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if ($_SESSION['rol'] === 'admin') {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="lista_usuarios.php">Lista de Usuarios</a>
                </li>';
                } else {
                    echo "";
                } ?>
                <li class="ml-auto">
                    <a class="nav-link btn btn2  d-flex text-white " href="logout.php">Cerrar Sesión</a>
                </li>
                <p><?php $_SESSION['email']  ?></p>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Tareas Registradas</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                <!-- 
                     <//?php if ($_SESSION['rol'] === 'admin') { ?> 
                    <//?php }else{ echo "";}?> 
                --> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['id_tarea'] ?></td>
                        <td><?= $tarea['email'] ?></td>
                        <td><?= $tarea['titulo'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td><?= $tarea['estado'] ?></td>


                        <?php //if ($_SESSION['rol'] === 'admin') { ?>
                           <td><!-- 
                                <button class="btn btn-3 mb-3">
                                    <a href="eliminar_tarea.php?id=<?php $tarea['id_tarea'] ?>" >Eliminar</a>
                                </button>-->
                                <button class="btn btn-4 mb-3">
                                    <a href="editar_tarea.php?id=<?php $tarea['id_tarea'] ?>" >Editar</a>
                                </button>
                            </td> 
                        <?php //}else{ echo "";}?>                 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php // if ($_SESSION['rol'] === 'admin') { ?>
            <div class="text-center ">
                <a href="alta_tarea.php" class="btn btn3">Agregar nueva tarea</a>
            </div>
            <?php // }else{ echo "";}?> 
    </div>
</body>
</html>