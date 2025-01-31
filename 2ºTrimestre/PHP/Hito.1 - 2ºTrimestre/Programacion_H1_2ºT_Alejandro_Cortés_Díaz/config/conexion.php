<?php
class Conexion {//Clase para la conexión a la base de datos
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $password = 'curso';
    private $base_datos = 'Hito_1_2ºTrimestre_Alejandro_Cortés_Díaz';
    public $conexion;
    //Constructor de la clase para poder conectar a la base de datos
    public function __construct() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
    //Función para cerrar la conexión a la base de datos después de haberla usado
    public function cerrar() {
        $this->conexion->close();
    }
}
?>
