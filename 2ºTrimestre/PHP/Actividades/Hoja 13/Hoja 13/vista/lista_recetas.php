<?php
require_once '../controlador/RecetasController.php';

// Crear una instancia del controlador
$controller = new RecetasController();

// Obtener las recetas de la base de datos
$recetas = $controller->obtenerRecetas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Estilo.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Recetas disponibles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link-1" href="lista_recetas.php">Lista de Recetas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Recetas Registradas</h2>
        <div class="row">
            <?php
            if ($recetas->num_rows > 0) {
                while ($receta = $recetas->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= $receta['titulo'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Ingredientes</h6>
                                <p class="card-text"><?= $receta['ingredientes'] ?></p>
                                <h6 class="card-subtitle mb-2 text-muted">Elaboración</h6>
                                <p class="card-text"><?= $receta['elaboracion'] ?></p>
                                <a href="editar_receta.php?id=<?= $receta['id_receta'] ?>" class="btn btn-primary">Editar</a>
                                <form action="eliminar_receta.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $receta['id_receta'] ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p>No hay recetas registradas.</p>';
            }
            ?>
        </div>
    </div>

</body>
</html>