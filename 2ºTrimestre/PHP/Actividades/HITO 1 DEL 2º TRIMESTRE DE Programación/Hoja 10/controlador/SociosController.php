<?php
require_once '../modelo/class_socio.php';

class SociosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Socio();
    }

    public function AgregarCliente($nombre, $apellidos, $email, $edad,$plan_base, $paquetes, $duracion) {
        $this->modelo->AgregarCliente($nombre, $apellidos, $email, $edad,$plan_base, $paquetes, $duracion);
    }

    public function listarSocios() {
        return $this->modelo->ObtenerClientes();
    }


    public function ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $plan_base, $paquetes, $duracion) {
        $this->modelo->ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $plan_base, $paquetes, $duracion);
    }

    public function EliminarCliente($id_cliente) {
        $this->modelo->EliminarCliente($id_cliente);
    }
}
?>
