<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pregunta'])) {
    // Configuración: Definimos el puerto y construimos la URL local.
    $puerto = '8000';
    $url = "http://localhost:$puerto/v1/completions";

    // Preparar los datos a enviar.
    $datos = array(
        'prompt' => "Responde en español. La respuesta debe seguir esta estructura: Título (y a continuación el título de la receta), Ingredientes (y a continuación los ingredientes necesarios) y Elaboración (y a continuación la elaboración requerida para cocinar la receta). Cada sección debe estar separada por una línea en blanco. Aquí está la solicitud: " . $_POST['pregunta'],
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
        // Verificar si la respuesta es válida JSON
        $jsonResponse = json_decode($respuesta, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            // Validar el formato de la respuesta
            if (isset($jsonResponse['choices']) && is_array($jsonResponse['choices']) && count($jsonResponse['choices']) > 0) {
                $texto = $jsonResponse['choices'][0]['text'];
                if (strpos($texto, 'Título') !== false && strpos($texto, 'Ingredientes') !== false && strpos($texto, 'Elaboración') !== false) {
                    echo json_encode($jsonResponse);
                } else {
                    echo json_encode(array('error' => 'Formato de respuesta inválido', 'raw_response' => $respuesta));
                }
            } else {
                echo json_encode(array('error' => 'Formato de respuesta inválido', 'raw_response' => $respuesta));
            }
        } else {
            echo json_encode(array('error' => 'Respuesta inválida del servidor', 'raw_response' => $respuesta));
        }
    }

    // Cerrar la sesión cURL para liberar recursos.
    curl_close($ch);
    exit;
}
?>