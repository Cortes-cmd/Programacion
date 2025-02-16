<?php

//Class conexion para la conexion a la base de datos con la información requerida para que se produzca
class Conexion {
    private $servidor = 'localhost';
    private $usuario = 'root'; 
    private $password = 'curso'; 
    private $base_datos = 'hito_2_2ºTrimestre_Alejandro_Cortes_Diaz'; 
    public $conexion; 

    // Constructor de la clase para crear una nueva conexión a la base de datos
    public function __construct() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);

        // Verificar si hay errores en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error); // Mostrar mensaje de error y detener la ejecución
        }
    }

    // Método para cerrar la conexión a la base de datos
    public function cerrar() {
        $this->conexion->close(); 
    }
}
?>
