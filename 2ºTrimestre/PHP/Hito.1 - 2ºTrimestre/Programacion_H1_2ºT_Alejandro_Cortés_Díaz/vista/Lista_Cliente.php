<?php
require_once '../controlador/ClientesController.php';

// Creo un objeto de la clase Socio para poder listar los clientes, y llamo a la función
$controller = new SociosController();
$socios = $controller->listarSocios();

// Array con los costos de los planes base, paquetes adicionales y la duración de la suscripción
$costos = [
    'PlanBase' => [
        'Basico' => 9.99,
        'Estandar' => 13.99,
        'Premium' => 17.99
    ],
    'PaquetesAdicionales' => [
        'Deporte' => 6.99,
        'Cine' => 7.99,
        'Infantil' => 4.99
    ],
    'Duracion' => [
        'Mensual' => 1,
        'Anual' => 12
    ]
];

// Función para calcular el costo total
function calcularCosto($socio, $costos) {
    // Verificar si el PlanBase existe en el array socio
    if (!isset($socio['PlanBase']) || !isset($costos['PlanBase'][$socio['PlanBase']])) {
        return 0; // O manejar el error de otra manera
    }

    // Saco costo de PlanBase
    $costoPlanBase = $costos['PlanBase'][$socio['PlanBase']];

    // Saco costo de PaquetesAdicionales
    $paquetes = isset($socio['PaquetesAdicionales']) ? explode(',', $socio['PaquetesAdicionales']) : [];
    // Sumo el costo de cada paquete adicional
    $costoPaquetes = array_reduce($paquetes, function($carry, $item) use ($costos) {
        // Compruebo si el paquete adicional aparece en costos
        if (isset($costos['PaquetesAdicionales'][$item])) {
            // Y sumo el costo del paquete adicional al acumulador
            return $carry + $costos['PaquetesAdicionales'][$item];
        }
        return $carry;
    }, 0);

    // Verifico si la Duracion existe en socio
    if (!isset($socio['Duracion']) || !isset($costos['Duracion'][$socio['Duracion']])) {
        return 0; // O manejar el error de otra manera
    }

    // Extraigo la duración
    $duracion = $costos['Duracion'][$socio['Duracion']];

    // Y Calculo el costo total
    return ($costoPlanBase + $costoPaquetes) * $duracion;
}
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
        <!-- Título de la página con los clientes y los datos de los mismos -->
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
                    <th>Costo Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Recorro socios para mostrar los datos correspondientes a los titulos de los ths, incluyendo, en acciones, editar y eliminar--> 
                <?php foreach ($socios as $socio): ?>
                    <tr>
                        <td><?= $socio['id_cliente'] ?></td>
                        <td><?= $socio['nombre'] ?></td>
                        <td><?= $socio['apellidos'] ?></td>
                        <td><?= $socio['email'] ?></td>
                        <td><?= $socio['edad'] ?></td>
                        <td><?= $socio['PlanBase'] ?></td>
                        <td><?= $socio['PaquetesAdicionales'] ?></td>
                        <td><?= htmlspecialchars(calcularCosto($socio, $costos)) ?> €</td>
                        <td>
                            <a href="Editar_Cliente.php?id=<?= $socio['id_cliente'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="Eliminar_Cliente.php?id_cliente=<?= $socio['id_cliente'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Botón para agregar un nuevo cliente -->
        <div class="text-center mt-3">
            <a href="Alta_Cliente.php" class="btn btn-success">Agregar un nuevo socio</a>
        </div>
    </div>
    <!-- Integración de JavaScript y Bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
