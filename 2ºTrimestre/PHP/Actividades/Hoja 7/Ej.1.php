<?php

class Persona{

    public $nombre;
    public $edad;
    public $genero;

    public function presentar(){

        return
        " Esta persona se llama; ". $this -> nombre . " Que tiene; ". $this -> edad. " Cuyo género es; ". $this-> genero;

    }

}

$MiPeople= New Persona();

$MiPeople -> nombre= "Marco Aurelio";
$MiPeople-> edad = 24;
$MiPeople -> genero= " Prefiero no decirlo ";

echo $MiPeople -> presentar();










































?>