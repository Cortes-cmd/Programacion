<?php
require_once 'class_conexion.php';

class Socios {
    private $conexion_clase;

    public function __construct() {
        $this->conexion_clase = new Conexion();
    }

    public function obtenerSocios() {
        $query = "SELECT * FROM socios";
        $resultado = $this->conexion_clase->conexion->query($query);

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "ID: " . $fila['id_socio'] . " - Nombre: " . $fila['nombre'] . " " . $fila['apellido'] . "<br>";
            }
        } else {
            echo "No hay socios registrados.";
        }
    }

    public function obtenerIdsYCorreosSocios() {
        $query = "SELECT email,id_socio FROM socios";
        $resultado = $this->conexion_clase->conexion->query($query);

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo " <br> ID: " . $fila['id_socio'] . " - Correo: " . $fila['email'] . " "  . "<br>";
            }
        } else {
            echo "No hay socios registrados.";
        }
    }
}

// Prueba
$socios = new Socios();
$socios->obtenerSocios();
$socios ->obtenerIdsYCorreosSocios()
?>
