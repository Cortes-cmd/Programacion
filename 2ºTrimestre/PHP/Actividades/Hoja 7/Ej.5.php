<?php

class ConversorMoneda{

    public $n1;


    public function convertirDolaresAEuros(){

        return

        $this-> n1. " Dolares son; ". $this ->n1 * 0.98. " Euros";


    }

    public function convertirEurosADolares(){

        return

        $this-> n1. " Euros son; ". $this ->n1 * 1.02. " Dolares";


    }

}

$MiConversion= New ConversorMoneda;

$MiConversion -> n1 = 23;

echo $MiConversion -> convertirDolaresAEuros();

echo $MiConversion -> convertirEurosADolares();





































?>