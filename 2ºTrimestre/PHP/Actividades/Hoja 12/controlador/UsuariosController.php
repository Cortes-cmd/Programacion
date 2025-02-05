<?php
require_once '../modelo/class_usuario.php';

class UsuariosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function AgregarUsuario($usuario,$password,$rol ) {
        $this->modelo->AgregarUsuario($usuario,$password,$rol);
    }

    public function ListarUsuarios() {
        return $this->modelo->ObtenerUsuarios();
    }

    public function ObtenerUsuarioPorId($id_usuario) {
        return $this->modelo->ObtenerUsuarioPorId($id_usuario);
    }

    public function ActualizarUsuario($id_usuario, $usuario,$password,$rol) {
        $this->modelo->ActualizarUsuario($id_usuario, $usuario,$password,$rol);
    }

    public function EliminarUsuario($id_usuario) {
        $this->modelo->EliminarUsuario($id_usuario);
    }

    public function VerificarUsuario($usuario, $password) {
        $this->modelo->VerificarUsuario($usuario, $password);
    }
}
?>
