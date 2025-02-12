<?php
require_once '../modelo/class_tareas.php';

class TareasController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Tarea();
    }

    public function AgregarTarea($email, $titulo, $descripcion, $estado) {
        $this->modelo->AgregarTarea($email, $titulo, $descripcion, $estado);
    }

    public function ListarTareas() {
        return $this->modelo->ObtenerTareas();
    }

    public function ObtenerTareaPorEmail($email) {
        return $this->modelo->ObtenerTareaPorEmail($email);
    }

    public function ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea) {
        $this->modelo->ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea);
    }

    public function EliminarTarea($email) {
        $this->modelo->EliminarTarea($email);
    }
}
?>
