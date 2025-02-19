<?php
//Referencio al archivo de la conexión a la db puesto que será necesaria la conexión para usar las funciones con sintaxis SQL
require_once '../config/conexion.php'; 
// Clase Tarea para gestionar la tabla de tareas
class Receta {
    private $conexion; 


    public function __construct() {
        $this->conexion = new Conexion(); 
    }

    // Método para agregar una nueva tarea
    public function AgregarReceta($titulo, $ingredientes, $elaboracion) {
        // Query SQL para insertar una nueva receta
        $query = "INSERT INTO receta (Titulo, Ingredientes, Elaboración) VALUES (?, ?, ?)";
        
        // Preparar la consulta
        $stmt = $this->conexion->conexion->prepare($query);
    
        // Asignar valores a los parámetros
        $stmt->bind_param("sss", $titulo, $ingredientes, $elaboracion);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Receta agregada con éxito.";
        } else {
            error_log("Error al agregar receta: " . $stmt->error);
            echo "Error al agregar receta: " . $stmt->error;
        }
    
        // Cerrar la consulta
        $stmt->close();
    }
    



    // Método para eliminar una tarea por su id
    public function obtenerRecetas() {
        $sql = "SELECT * FROM receta ORDER BY id_receta DESC";
        return $this->conexion->conexion->query($sql);
    }
}
?>
