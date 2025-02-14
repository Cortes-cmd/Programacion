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

    public function ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea) {
        $this->modelo->ActualizarTarea($email, $titulo, $descripcion, $estado, $id_tarea);
    }

    public function EliminarTarea($id_tarea) {
        $this->modelo->EliminarTarea($id_tarea);
    }

    public function actualizarEstado($id_tarea, $estado) {
        $this->modelo->ActualizarEstado($id_tarea, $estado);
    }

    public function ListarTareasPorEmail($email) {
        return $this->modelo->ObtenerTareasPorEmail($email);
    }
}
?>
