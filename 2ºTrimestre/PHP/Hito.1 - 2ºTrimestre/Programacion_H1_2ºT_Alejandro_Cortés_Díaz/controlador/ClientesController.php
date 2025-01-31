<?php
// Enlazo con class cliente para poder usar sus funciones en el controlador
require_once '../modelo/Class_Cliente.php';

class SociosController {
    private $modelo;
    // Creo un objeto de la clase Socio
    public function __construct() {
        $this->modelo = new Socio();
    }
    // Función para agregar un cliente
    public function AgregarCliente($nombre, $apellidos, $email, $edad,$PlanBase, $PaquetesAdicionales, $Duracion) {
        $this->modelo->AgregarCliente($nombre, $apellidos, $email, $edad,$PlanBase, $PaquetesAdicionales, $Duracion);
    }
    // Función para listar los clientes
    public function listarSocios() {
        return $this->modelo->ObtenerClientes();
    }

    // Función para actualizar los clientes a la hora de editar
    public function ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $PlanBase, $PaquetesAdicionales, $Duracion) {
        $this->modelo->ActualizarClientes($id_cliente, $nombre, $apellido, $email,$edad, $PlanBase, $PaquetesAdicionales, $Duracion);
    }
    // Función para eliminar a un cliente
    public function EliminarCliente($id_cliente) {
        $this->modelo->EliminarCliente($id_cliente);
    }
}
?>
