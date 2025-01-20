<?php

class CuentaBancaria{

    private $titular;
    private $saldo;
    private $tipoCuenta;

    public function __construct($titular,$tipoCuenta)
    {

        $this->titular = $titular;
        $this->saldo = 0;
        $this->tipoCuenta = $tipoCuenta;



    }


    public function depositar($cantidad){

        if ($cantidad >0) {
            $this-> saldo += $cantidad;
            echo" Has depositado {$cantidad} € \n";
        }

        else {
            echo "No estás añadiendo nada";
        }
    
        return 

        $cantidad;
    }

    public function retirar($cantidad){

        if ($this->verificarSaldoSuficiente($cantidad)){
            $this->saldo -=$cantidad;
            echo " Has retirado {$cantidad} €";}
        else {
            echo "No tienes suficiente dinero\n";
        }
        



    }

    private function verificarSaldoSuficiente($cantidad){

       return $cantidad < $this-> saldo;



    }

}

$Proceso = New CuentaBancaria("Marcelo","Corriente");

$Proceso -> depositar(450);

$Proceso -> retirar(400);



























?>