function actualizarEstado(id_tarea, estado) {
    console.log("Enviando solicitud para actualizar estado:", id_tarea, estado); // Agrega esta línea para depuración
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "actualizar_estado.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log("Estado actualizado");
                console.log("Respuesta del servidor:", xhr.responseText); // Agrega esta línea para depuración
            } else {
                console.error("Error al actualizar estado: " + xhr.statusText);
            }
        }
    };
    xhr.send("id_tarea=" + encodeURIComponent(id_tarea) + "&estado=" + encodeURIComponent(estado));
}