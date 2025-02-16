<?php
//Referencio a la clase Tarea para usar sus metodos
require_once '../modelo/class_tareas.php'; 

//Clase controlador para las tareas
class TareasController {
    private $modelo; 

    // Constructor de la clase
    public function __construct() {
        $this->modelo = new Tarea(); // Crea una nueva instancia del modelo de tareas
    }

    // Método para agregar una nueva tarea
    public function AgregarTarea($email, $titulo, $descripcion, $estado) {
        $this->modelo->AgregarTarea($email, $titulo, $descripcion, $estado);
    }


    // Método para eliminar una tarea por un id específico
    public function EliminarTarea($id_tarea) {
        $this->modelo->EliminarTarea($id_tarea);
    }

    // Método para actualizar el estado de una tarea pickeando el id de la tarea y una vez encontrada, modificar el estado con función php
    public function actualizarEstado($id_tarea, $estado) {
        $this->modelo->ActualizarEstado($id_tarea, $estado);
    }

    // Método para listar tareas por el correo electrónico único de cada usuario
    public function ListarTareasPorEmail($email) {
        return $this->modelo->ObtenerTareasPorEmail($email);
    }
}
?>
