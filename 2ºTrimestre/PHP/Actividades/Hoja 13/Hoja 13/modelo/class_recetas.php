<?php
require_once '../config/conexion.php'; 

class Receta {
    private $conexion; 

    public function __construct() {
        $this->conexion = new Conexion(); 
    }

    public function AgregarReceta($titulo, $ingredientes, $elaboracion) {
        $query = "INSERT INTO receta (titulo, ingredientes, elaboracion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $titulo, $ingredientes, $elaboracion);
        if ($stmt->execute()) {
            echo "Receta agregada con éxito.";
        } else {
            error_log("Error al agregar receta: " . $stmt->error);
            echo "Error al agregar receta: " . $stmt->error;
        }
        $stmt->close();
    }

    public function obtenerRecetas() {
        $sql = "SELECT * FROM receta ORDER BY id_receta DESC";
        return $this->conexion->conexion->query($sql);
    }

    public function eliminarReceta($id_receta) {
        $query = "DELETE FROM receta WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_receta);
        if ($stmt->execute()) {
            echo "Receta eliminada con éxito.";
        } else {
            error_log("Error al eliminar receta: " . $stmt->error);
            echo "Error al eliminar receta: " . $stmt->error;
        }
        $stmt->close();
    }

    public function editarReceta($id_receta, $titulo, $ingredientes, $elaboracion) {
        $query = "UPDATE receta SET titulo = ?, ingredientes = ?, elaboracion = ? WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $titulo, $ingredientes, $elaboracion, $id_receta);
        if ($stmt->execute()) {
            echo "Receta actualizada con éxito.";
        } else {
            error_log("Error al actualizar receta: " . $stmt->error);
            echo "Error al actualizar receta: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>