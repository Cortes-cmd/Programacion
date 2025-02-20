<?php
//Referencio a la clase Tarea para usar sus metodos
require_once '../modelo/class_recetas.php'; 

//Clase controlador para las tareas
class RecetasController {
    private $modelo; 

    // Constructor de la clase
    public function __construct() {
        $this->modelo = new Receta(); // Crea una nueva instancia del modelo de tareas
    }

    // Método para agregar una nueva tarea
    public function AgregarReceta($titulo, $ingredientes, $elaboracion) {
        $this->modelo->AgregarReceta($titulo, $ingredientes, $elaboracion);
    }

    public function obtenerRecetas() {
        return $this->modelo->obtenerRecetas();
    
    }


}
?>
