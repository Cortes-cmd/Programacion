// Función para actualizar el estado de una tarea en tiempo real
function actualizarEstado(id_tarea, estado) {
    //Agrego esta línea para saber si se está actovando la función correctamente
    console.log("Enviando solicitud para actualizar estado:", id_tarea, estado);
    // Crea una nueva instancia de XMLHttpRequest para la solicitud al servidor
    const xhr = new XMLHttpRequest();
    //Marca la solicitud como POST y establece la URL a la que se enviarán los datos
    xhr.open("POST", "actualizar_estado.php", true);
    // Establece el encabezado de la solicitud, es importante para que el servidor pueda interpretar el formato de los datos enviados en la solicitud
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // Establece la función que se ejecutará cuando el estado de la solicitud cambie
    xhr.onreadystatechange = function () {
        // Verifica el estado de la solicitud, al ser 4 significa que la solicitud ha sido completada y la respuesta está lista de ser procesada
        if (xhr.readyState === 4) { 
            // Verifica el estado de la respuesta, al ser 200 significa que la solicitud fue exitosa y se devolvieron los datos correctamente
            if (xhr.status === 200) { 
                // Muestra un mensaje en la consola para indicar que el estado ha sido actualizado
                console.log("Estado actualizado"); 
                // Muestra la respuesta del servidor en la consola para verificar que los datos se han actualizado correctamente
                console.log("Respuesta del servidor:", xhr.responseText);
            } else {
                // Muestra un mensaje de error en la consola si la solicitud no se ha completado correctamente
                console.error("Error al actualizar estado: " + xhr.statusText); 
            }
        }
    };
    // Envía la solicitud con los datos requeridos para actualizar el estado de la tarea
    xhr.send("id_tarea=" + encodeURIComponent(id_tarea) + "&estado=" + encodeURIComponent(estado));
}

// Función para habilitar o deshabilitar el botón basado en el estado del checkbox
function enabler() {
    // Obtiene el botón por su ID
    const button = document.getElementById("button"); 
    // Obtiene el checkbox por su ID
    const check = document.getElementById("checkbox"); 
    // Habilita o deshabilita el botón basado en el estado del checkbox
    button.disabled = !check.checked; 
}