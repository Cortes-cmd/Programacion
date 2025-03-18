<?php
// Referencio a la clase Receta para usar sus métodos
require_once '../modelo/class_recetas.php'; 

// Clase controlador para las recetas
class RecetasController {
    private $modelo; 

    // Constructor de la clase
    public function __construct() {
        $this->modelo = new Receta(); // Crea una nueva instancia del modelo de recetas
    }

    // Método para agregar una nueva receta
    public function AgregarReceta($titulo, $ingredientes, $elaboracion) {
        $this->modelo->AgregarReceta($titulo, $ingredientes, $elaboracion);
    }

    // Método para obtener todas las recetas
    public function obtenerRecetas() {
        return $this->modelo->obtenerRecetas();
    }

    // Método para eliminar una receta
    public function eliminarReceta($id_receta) {
        $this->modelo->eliminarReceta($id_receta);
    }

    // Método para editar una receta
    public function editarReceta($id_receta, $titulo, $ingredientes, $elaboracion) {
        $this->modelo->editarReceta($id_receta, $titulo, $ingredientes, $elaboracion);
    }
}
?>