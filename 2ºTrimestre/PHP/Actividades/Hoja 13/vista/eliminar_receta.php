<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Eliminar la receta del archivo o base de datos
    $file = '../data/recetas.json';
    $recetas = json_decode(file_get_contents($file), true);
    unset($recetas[$id]);
    file_put_contents($file, json_encode($recetas));


}
?>