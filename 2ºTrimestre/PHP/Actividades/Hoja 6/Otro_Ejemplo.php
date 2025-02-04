<?php

error_reporting(E_ALL);

class Mascota{

public $nombre;
public $tipo;

 public function presentar(){

    
    echo "Este/a es ". $this-> nombre . " ,es un/a " . $this -> tipo;


 }

 public function emitir_sonido(){

    if ($this->tipo == "perro") {
        echo " GUAU GUAU ";
    }
    
    elseif ($this->tipo =="gato") {
        echo " Miau Miau ";
    }

    else {
        echo "ESO NO E UN ANIMAL ESO E UN DIAVLO";
    }


 }

}
$miMascota = new Mascota();
$miMascota -> nombre= "Pipo";
$miMascota -> tipo= "perro";


$miMascota -> presentar();
$miMascota -> emitir_sonido();









?>