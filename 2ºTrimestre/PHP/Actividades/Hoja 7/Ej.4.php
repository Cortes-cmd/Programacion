<?php

class Producto{

    public $nombre;
    public $precio;

    public function mostrarDetalles(){

        return
        " Este producto se llama; ". $this-> nombre . " Y cuesta; ". $this-> precio;

    }



}

class Electrodoméstico extends Producto{

    public $consumo;

    public function mostrarDetalles()
    {
        return
        " Este producto se llama; ". $this -> nombre. " Cuesta; ". $this -> precio. " Y consume; ". $this-> consumo;


    }


}

$MiProducto= new Producto;

$MiProducto -> nombre = "Papitas ricas";
$MiProducto -> precio = "259 bolívares";


echo $MiProducto -> mostrarDetalles();


$MiElectrodomestico = New Electrodoméstico;

$MiElectrodomestico -> nombre = "Tostadora";
$MiElectrodomestico -> precio = "12";
$MiElectrodomestico -> consumo = "2 mensuales";

echo $MiElectrodomestico -> mostrarDetalles();






































?>