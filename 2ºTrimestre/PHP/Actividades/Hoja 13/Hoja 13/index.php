<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Integración de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="vista/Estilo.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Recetas disponibles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link-1" href="vista/lista_recetas.php">Lista de Recetas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Asistente de Recetas IA</h2>
        <div class="mb-3">
            <label for="pregunta" class="form-label">Escribe tu solicitud:</label>
            <input type="text" class="form-control" id="pregunta" placeholder="Ej. Dame una receta de pasta con champiñones">
        </div>
        <button class="btn btn-primary" id="enviar">Enviar</button>
        <div id="respuesta" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#enviar').click(function() {
                var pregunta = $('#pregunta').val();
                if (!pregunta.trim()) {
                    alert('Por favor, ingresa una pregunta');
                    return;
                }
                
                $.ajax({
                    url: 'procesar.php',
                    type: 'POST',
                    data: { pregunta: pregunta },
                    success: function(response) {
                        console.log("Respuesta del servidor:", response); // Línea de depuración
                        try {
                            var jsonResponse = JSON.parse(response);
                            console.log("Respuesta JSON parseada:", jsonResponse); // Línea de depuración
                            if (jsonResponse.error) {
                                $('#respuesta').html('<strong>Error:</strong> ' + JSON.stringify(jsonResponse.error));
                                console.error("Error en la respuesta:", jsonResponse); // Línea de depuración
                            } else {
                                if (Array.isArray(jsonResponse.choices) && jsonResponse.choices.length > 0) {
                                    var receta = jsonResponse.choices[0].text.replace(/\n/g, '<br>');
                                    $('#respuesta').html('<strong>Respuesta:</strong><br>' + receta);

                                    // Validar que la receta cumple con el formato esperado
                                    if (!receta.includes('Título') || !receta.includes('Ingredientes') || !receta.includes('Elaboración')) {
                                        $('#respuesta').html('<strong>Error:</strong> La receta no tiene el formato esperado.');
                                        return;
                                    }

                                    // Enviar la receta a alta_receta.php
                                    $.ajax({
                                        url: 'vista/alta_receta.php',
                                        type: 'POST',
                                        data: { receta: receta },
                                        success: function(data) {
                                            console.log("Respuesta de alta_receta.php:", data); // Línea de depuración
                                            try {
                                                var result = JSON.parse(data);
                                                if (result.success) {
                                                    alert(result.message);
                                                } else {
                                                    alert(result.message);
                                                }
                                            } catch (e) {
                                                alert('Error al procesar la respuesta del servidor');
                                                console.error("Error al procesar la respuesta de alta_receta.php:", e); // Línea de depuración
                                            }
                                        },
                                        error: function() {
                                            alert('Error al guardar la receta');
                                            console.error("Error en la solicitud a alta_receta.php"); // Línea de depuración
                                        }
                                    });
                                } else {
                                    $('#respuesta').html('<strong>Error:</strong> No se encontraron recetas.');
                                }
                            }
                        } catch (e) {
                            $('#respuesta').html('<strong>Respuesta:</strong><br>' + response.replace(/\n/g, '<br>'));
                            console.error("Error al procesar la respuesta del servidor:", e); // Línea de depuración
                        }
                    },
                    error: function() {
                        $('#respuesta').html('<strong>Error:</strong> No se pudo obtener una respuesta.');
                        console.error("Error en la solicitud a procesar.php"); // Línea de depuración
                    }
                });
            });
        });
    </script>
</body>
</html>