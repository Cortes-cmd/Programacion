<?php

class Animal{

    public $especie;

    public function emitirSonido(){

        return

        "MIAU MIAU ";



    }

   
}

class Perro extends Animal{

    public $raza;

    public function PresentacionCordial(){

        return

        " Este animal es de la especie; ". $this -> especie. " Y de la raza; ". $this -> raza;




    }


}


$MiPerro = New Perro;

$MiPerro -> especie = "Cocker";
$MiPerro -> raza = "Cocker Holder";

echo $MiPerro -> emitirSonido();

echo $MiPerro -> PresentacionCordial();





























?>