<?php
//Referencio a la clase Usuario para usar sus metodos como en el archivo anterior
require_once '../modelo/class_usuario.php'; 

class UsuariosController {
    private $modelo;

    // Constructor de la clase
    public function __construct() {
        $this->modelo = new Usuario(); // Crea una nueva instancia del modelo
    }

    // Método para agregar un nuevo usuario
    public function AgregarUsuario($email, $nombre, $password) {
        $this->modelo->AgregarUsuario($email, $nombre, $password);
    }
    
    // Método para obtener un usuario por su correo electrónico único
    public function ObtenerUsuarioPorEmail($email) {
        return $this->modelo->ObtenerUsuarioPorEmail($email);
    }

  
}
?>
