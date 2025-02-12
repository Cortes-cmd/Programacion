<?php
require_once '../modelo/class_usuario.php';

class UsuariosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function AgregarUsuario($email,$nombre,$password) {
        $this->modelo->AgregarUsuario($email,$nombre,$password);
    }

    public function ListarUsuarios() {
        return $this->modelo->ObtenerUsuarios();
    }

    public function ObtenerUsuarioPorEmail($email) {
        return $this->modelo->ObtenerUsuarioPorEmail($email);
    }

    public function VerificarUsuario($email, $password) {
        return $this->modelo->VerificarUsuario($email, $password);
    }
}
?>
