<?php

Class Vehiculo{

    private $marca;
    private $modelo;

    public function __construct($marca,$modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function encender(){

        return
        "El vehículo está encendido \n  ";


    }



    public function getMarca(){
        return $this->marca;
        
    }

    public function getModelo(){
        return $this->modelo;
        
    }

}

Class Coche extends Vehiculo{
    protected $combustible;

    public function __construct($marca,$modelo,$combustible)
    {
        parent :: __construct($marca,$modelo);
        $this->combustible = $combustible;
    }



    public function mostrarDetalles(){


        return
        " El coche posee los siguientes datos: \n Marca; {$this->getMarca()}\n Modelo; \n {$this->getModelo()} \n Combustible; \n {$this->combustible}";

    }

}


$Car= New Coche("Toyaco","9857T","Diésel");



echo $Car -> encender();

echo $Car -> mostrarDetalles();






































?>