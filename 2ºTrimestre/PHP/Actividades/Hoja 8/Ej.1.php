<?php

error_reporting(E_ALL);

class CuentaBancaria{


    public $titular;
    public $saldo;
    public $TipoDeCuenta;

    public function depositar(){

       echo "Tu cuenta posee esta cantidad de dinero; ".$this->saldo."\n";

       $consulta = readline("Cuanta cantidad desea depositar?");



       if ($consulta >0) {
        $this->saldo += $consulta; 

        echo "Acabas de depositar; ". $consulta;

        echo " La cantidad de saldo actual, tras depositar, es; ". $this->saldo. "\n";
        }    
        else {
         echo "La cantidad no es valida, ha de ser mayor que 0";
        }
    
    }
    public function retirar(){
        
       echo "Tu cuenta posee esta cantidad de dinero; ".$this->saldo."\n";

        $consulta= readline("Cual es la cantidad que desea retirar?");

        if ($consulta>$this->saldo) {
            echo "Estas quedandote en numeros rojos!! No es posible";
        }
        elseif ($consulta <=$this->saldo) {
            $this->saldo -= $consulta;

            echo "Has retirado ". $consulta. " Lo que te deja con la siguiente cifra; ". $this->saldo. "\n";
        }

    }
    public function mostrarInfo(){

        return
        "Esta cuenta bancaria le pertenece a; ". $this->titular. "\n". "Cuenta con un saldo de; ".$this->saldo. "\n"."Y su tipo de cuenta es; ". $this-> TipoDeCuenta. "\n";
       
        
    }
}



$Proceso = New CuentaBancaria;

$Proceso -> titular = "Ongombo";
$Proceso -> saldo = 450;
$Proceso -> TipoDeCuenta= "Corriente";

$Proceso -> depositar();
$Proceso -> retirar();
echo $Proceso -> mostrarInfo();

























?>