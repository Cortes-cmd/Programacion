<?php
// eliminar_socio.php
require_once '../controlador/SociosController.php';


if (isset($_GET['id'])) {
    $id_cliente = $_GET['id'];
    $controller = new SociosController();
    $controller->Eliminarsocio($id_cliente);
    header("Location: ../index.php");
    exit();
}
?>


LISTA SOCIO

<?php
require_once '../controlador/SociosController.php';
$controller = new SociosController();
$socios = $controller->listarSocios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
</head>
<body>
    <h1>Socios Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($socios as $socio): ?>
            <tr>
                <td><?= $socio['id_socio'] ?></td>
                <td><?= $socio['nombre'] ?></td>
                <td><?= $socio['apellido'] ?></td>
                <td><?= $socio['email'] ?></td>
                <td><?= $socio['telefono'] ?></td>
                <td><?= $socio['fecha_nacimiento'] ?></td>
                <td>
                    <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>">Editar</a>
                    <a href="eliminar_socio.php?id=<?= $socio['id_socio'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="alta_socio.php">Agregar un nuevo socio</a>
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
    <!-- Integración de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Socios Registrados</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socios as $socio): ?>
                    <tr>
                        <td><?= $socio['id_socio'] ?></td>
                        <td><?= $socio['nombre'] ?></td>
                        <td><?= $socio['apellido'] ?></td>
                        <td><?= $socio['email'] ?></td>
                        <td><?= $socio['telefono'] ?></td>
                        <td><?= $socio['fecha_nacimiento'] ?></td>
                        <td>
                            <a href="editar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_socio.php?id=<?= $socio['id_socio'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
            <a href="alta_socio.php" class="btn btn-success">Agregar un nuevo socio</a>
        </div>
    </div>
    <!-- Integración de JavaScript de Bootstrap (opcional para funciones avanzadas) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
