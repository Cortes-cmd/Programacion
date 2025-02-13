<?php
require_once '../config/conexion.php';

class Tarea {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function AgregarTarea($email, $titulo, $descripcion, $estado) {
        $query = "INSERT INTO tarea (email, titulo, descripcion, estado) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssss", $email, $titulo, $descripcion, $estado);

        if ($stmt->execute()) {
            echo "Tarea agregada con éxito.";
        } else {
            echo "Error al agregar tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function ObtenerTareas() {
        $query = "SELECT * FROM tarea";
        $resultado = $this->conexion->conexion->query($query);
        $socios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $socios[] = $fila;
        }
        return $socios;
    }

    public function ObtenerTareaPorEmail($email) {
        $query = "SELECT * FROM tarea WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea) {
        $query = "UPDATE tarea SET email = ?, titulo = ?, descripcion = ?, estado = ? WHERE id_tarea = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssi", $email, $titulo, $descripcion, $estado, $id_tarea);

        if ($stmt->execute()) {
            echo "Tarea actualizada con éxito.";
        } else {
            echo "Error al actualizar tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function EliminarTarea($email) {
        $query = "DELETE FROM tarea WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "Tarea eliminado con éxito.";
        } else {
            echo "Error al eliminar tarea: " . $stmt->error;
        }

        $stmt->close();
    }

    public function ActualizarEstado($id_tarea, $estado) {
        $query = "UPDATE tarea SET estado = ? WHERE id_tarea = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("si", $estado, $id_tarea);

        if ($stmt->execute()) {
            echo "Estado actualizado con éxito.";
        } else {
            echo "Error al actualizar estado: " . $stmt->error;
        }

        $stmt->close();
    }

    public function ObtenerTareasPorEmail($email) {
        $query = "SELECT * FROM tarea WHERE email = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $tareas = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $tareas;
    }
}
?>
