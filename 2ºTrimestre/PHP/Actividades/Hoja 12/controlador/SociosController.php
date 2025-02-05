<?php
require_once '../modelo/class_socio.php';

class SociosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Socio();
    }

    public function AgregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento ) {
        $this->modelo->AgregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function ListarSocios() {
        return $this->modelo->ObtenerSocios();
    }

    public function ObtenerSocioPorId($id_socio) {
        return $this->modelo->ObtenerSocioPorId($id_socio);
    }

    public function ActualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->ActualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function EliminarSocio($id_socio) {
        $this->modelo->EliminarSocio($id_socio);
    }
}
?>
