<?php
error_reporting(E_ALL);

class Empleado{

    public $nombre;
    public $sueldo;

    public function mostrarDetalles(){

        return
        " Este empleado se llama; " . $this->nombre . " y cobra; ". $this -> sueldo;



    }


}

class Gerente extends Empleado{

    public $departamento;

    public function mostrarDetalles()
    {
        return 
        " Este empleado se llama; ". $this-> nombre. " Y Cobra; ". $this-> sueldo. " Y pertenece al departamento; ". $this-> departamento;
    }


}



$MiEmpleado = new Empleado();
$MiEmpleado -> nombre = "Aitor";
$MiEmpleado -> sueldo = 4590;

$MiGerente = new Gerente();
$MiGerente -> nombre = "Juan Pedro Montoya de los Lares Unidos";
$MiGerente -> sueldo = "4 francos";
$MiGerente -> departamento= "Limpieza";

echo $MiEmpleado -> mostrarDetalles();
echo $MiGerente -> mostrarDetalles();


































?>