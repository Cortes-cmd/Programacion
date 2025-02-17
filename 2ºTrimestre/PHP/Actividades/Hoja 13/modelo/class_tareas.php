<?php
//Referencio al archivo de la conexión a la db puesto que será necesaria la conexión para usar las funciones con sintaxis SQL
require_once '../config/conexion.php'; 
// Clase Tarea para gestionar la tabla de tareas
class Tarea {
    private $conexion; 


    public function __construct() {
        $this->conexion = new Conexion(); 
    }

    // Método para agregar una nueva tarea
    public function AgregarTarea($email, $titulo, $descripcion, $estado) {
        // Sintaxis SQL para agregar una nueva tarea con el insert into
        $query = "INSERT INTO tarea (email, titulo, descripcion, estado) VALUES (?, ?, ?, ?)";
        // Preparar la query a traves de la conexión a la base de datos
        $stmt = $this->conexion->conexion->prepare($query);
        // Asignar los valores a los parámetros de la query
        $stmt->bind_param("ssss", $email, $titulo, $descripcion, $estado);
        //Si la query se ejecuta correctamente, mostrar mensaje de éxito
        if ($stmt->execute()) {
            echo "Tarea agregada con éxito.";
        } else {
            //Sino, mostrar mensaje de error
            error_log("Error al agregar tarea: " . $stmt->error);
            echo "Error al agregar tarea: " . $stmt->error;
        }
        //Cierro conexión
        $stmt->close();
    }



    // Método para eliminar una tarea por su id
    public function EliminarTarea($id_tarea) {
        // Sintaxis SQL para eliminar la tarea tarea con el delete por el id de la tarea
        $query = "DELETE FROM tarea WHERE id_tarea = ?";
        //Preparo la query
        $stmt = $this->conexion->conexion->prepare($query);
        //Asigno el valor al parámetro 
        $stmt->bind_param("i", $id_tarea);
        //Si la query se ejecuta correctamente, mostrar mensaje de éxito
        if ($stmt->execute()) {
            echo "Tarea eliminada con éxito.";
        } else {
        //Sino, mostrar mensaje de error
            error_log("Error al eliminar tarea: " . $stmt->error); // Registro de errores
            echo "Error al eliminar tarea: " . $stmt->error;
        }
        //Cierro conexión
        $stmt->close();
    }

    // Método para actualizar el estado de una tarea por el id de la misma
    public function ActualizarEstado($id_tarea, $estado) {
        // Sintaxis SQL para modificar la tarea tarea con el update por el id de la tarea
        $query = "UPDATE tarea SET estado = ? WHERE id_tarea = ?";
        //Preparo la query
        $stmt = $this->conexion->conexion->prepare($query);
        //Asigno los valores
        $stmt->bind_param("si", $estado, $id_tarea);
        //Si la query se ejecuta correctamente, mostrar mensaje de éxito
        if ($stmt->execute()) {
            echo "Estado actualizado con éxito.";
        } else {
        //Sino, mostrar mensaje de error
            error_log("Error al actualizar estado: " . $stmt->error); // Registro de errores
            echo "Error al actualizar estado: " . $stmt->error;
        }
        //Cierro conexión
        $stmt->close();
    }

    // Método para obtener todas las tareas por correo electrónico único	
    public function ObtenerTareasPorEmail($email) {
        // Sintaxis SQL para seleccionar todas las tareas por correo electrónico
        $query = "SELECT * FROM tarea WHERE email = ?";
        //Preparo la query
        $stmt = $this->conexion->conexion->prepare($query);
        //Asigno el valor al parámetro
        $stmt->bind_param("s", $email);
        //Ejecuto la query
        $stmt->execute();
        //Guardo el resultado en la variable result
        $result = $stmt->get_result();
        //Guardo las tareas obtenidas a través de la sentencia fetch, en la variable tareas "MYSQLI_ASSOC" obtiene todos los datos como un array de arrays asociativos, donde cada nombre de la columna actúa como clave
        $tareas = $result->fetch_all(MYSQLI_ASSOC);
        //Si no hay tareas, muestro mensaje de error
        if (!$tareas) {
            error_log("Error al obtener tareas por email: " . $stmt->error); // Registro de errores
        }
        //Cierro conexión
        $stmt->close();
        return $tareas;
    }
}
?>
