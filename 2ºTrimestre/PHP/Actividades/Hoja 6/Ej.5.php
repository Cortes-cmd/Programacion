<?php

error_reporting(E_ALL);

class Calculadora{

    public $n1;
    public $n2;

    public function sumar(){

        return
        " El resultado de la suma es; ". $this-> n1 + $this-> n2 . "\n";

    }

    public function restar(){

        return
        " El resultado de la resta es; ". $this-> n1 - $this-> n2. "\n";

    }

    public function multiplicar(){

        return
        " El resultado de la multiplicación es; ". $this-> n1 * $this-> n2. "\n";

    }

    public function dividir(){

        try{

        if ($this ->n2==0) {
                throw new Exception("EHTA VAINA TA DURA". "\n");
            }

        else {
            return
            " El resultado de la división es; ".$this -> n1 / $this-> n2. "\n";
        }
        }
        

        catch(Exception $e){

            echo "Error". $e ->getMessage();
        }


       

    }



}


$MiOperacion= New Calculadora;
$MiOperacion -> n1 = 2;
$MiOperacion -> n2 = 4;


echo $MiOperacion -> sumar() . $MiOperacion -> restar(). $MiOperacion -> multiplicar(). $MiOperacion -> dividir();







?>

