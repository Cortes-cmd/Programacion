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
    <!-- Integración de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Clientes Registrados</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th> 
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Tipo_De_Plan</th>
                    <th>Paquete_Adicional</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($socios as $socio): ?>
                    <tr>
                        <td><?= $socio['id_cliente'] ?></td>
                        <td><?= $socio['nombre'] ?></td>
                        <td><?= $socio['apellidos'] ?></td>
                        <td><?= $socio['email'] ?></td>
                        <td><?= $socio['edad'] ?></td>
                        <td><?= $socio['PlanBase'] ?></td>
                        <td><?= $socio['PaquetesAdicionales'] ?></td>
                        <td>
                            <a href="editar_socio.php?id=<?= $socio['id_cliente'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar_socio.php?id=<?= $socio['id_cliente'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
