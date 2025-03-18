<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pregunta'])) {
    // Configuración: Definimos el puerto y construimos la URL local.
    $puerto = '8000';
    $url = "http://localhost:$puerto/v1/completions";

    // Preparar los datos a enviar.
    $datos = array(
        'prompt' => "Responde en español. La respuesta debe estar dividida en tres secciones: Título, Ingredientes y Elaboración. Cada sección debe estar separada por una línea en blanco. Aquí está la solicitud: " . $_POST['pregunta'],
        'max_tokens' => 600
    );

    // Convertir el array a formato JSON.
    $jsonDatos = json_encode($datos);

    // Inicializar cURL para preparar la petición.
    $ch = curl_init($url);

    // Configurar cURL:
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);

    // Configurar las cabeceras HTTP necesarias.
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonDatos)
    ));

    // Ejecutar la petición y capturar la respuesta del servidor.
    $respuesta = curl_exec($ch);

    // Comprobar si se produjo algún error en la comunicación.
    if (curl_errno($ch)) {
        echo json_encode(array('error' => curl_error($ch)));
    } else {
        echo $respuesta;
    }

    // Cerrar la sesión cURL para liberar recursos.
    curl_close($ch);
    exit;
}
?>