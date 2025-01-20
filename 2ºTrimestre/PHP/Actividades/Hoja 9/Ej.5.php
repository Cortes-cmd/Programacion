<?php

Class Empleado{

    private $nombre;
    private $sueldo;
    private $puesto;

    public function __construct($nombre,$sueldo,$puesto)
    {
        $this-> nombre = $nombre;
        $this-> sueldo = $sueldo;
        $this-> puesto = $puesto;
    }

    public function setSueldo($nuevoSueldo){

        return
        
        $this->sueldo = $nuevoSueldo;


    }

    public function getSueldo(){

        return $this->sueldo;



    }

    public function getNombre(){

        return $this->nombre;
    }

    public function getPuesto(){

        return $this->puesto;
    }

}

Class Manager extends Empleado{

    protected $departamento;

    public function __construct($nombre,$sueldo,$puesto,$departamento)
    {
        parent :: __construct($nombre,$sueldo,$puesto);
        $this->departamento = $departamento;
    }


    public function revisarEmpleado(Empleado $empleado){

        return
        "El empleado posee los siguientes datos; \n Nombre; \n{$empleado->getNombre()}\n Sueldo; \n {$empleado->getSueldo()}\n Puesto;\n {$empleado->getPuesto()}\n Departamento; {$this->departamento}";





    }

}

$Mamager = New Manager("Brum Brum", 2459,"Observador","Madre mia el bichito","Devoradores de protones");



$Empedocles = New Empleado ("Empedocles", "Le pagamos con migas de pan","Cuidao");



echo $Mamager -> revisarEmpleado($Empedocles);





























?>