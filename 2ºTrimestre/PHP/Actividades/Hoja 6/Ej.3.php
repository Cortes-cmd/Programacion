<?php


class Vehiculo{

    public $marca;

    public function encender(){

        return
        " BRUM BRUM ";



    }
}


class Coche extends Vehiculo{

    public $modelo;




}


$Micoche= new Coche();
$Micoche -> marca = "Toyota";
$Micoche -> modelo= "R8";
echo $Micoche -> encender();

$Micoche_2 = new Vehiculo();
$Micoche_2 -> marca = "Ford";

echo $Micoche_2 -> encender();














?>