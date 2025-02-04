<?php

class Rectangulo{

    public $base;
    public $altura;

    public function calcular(){

        return
        " El área del triángulo es; " . $this -> base * $this -> altura;



    }



}

$MiRectangulo = New Rectangulo;

$MiRectangulo -> base = 13;
$MiRectangulo -> altura = 7;

echo $MiRectangulo -> calcular();
































?>