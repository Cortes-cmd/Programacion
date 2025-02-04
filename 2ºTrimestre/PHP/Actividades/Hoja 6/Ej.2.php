<?php
error_reporting(E_ALL);

class Circulo{

    public $radio;


    public function calcularArea(){

        return 

        " El área del Círculo es ; ". 3.14 * $this-> radio**2;




    }


}

$Micirculo = new Circulo();
$Micirculo -> radio = 12.3;

echo $Micirculo -> calcularArea();








?>