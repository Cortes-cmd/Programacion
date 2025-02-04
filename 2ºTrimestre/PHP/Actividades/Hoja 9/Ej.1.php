<?php

class Producto{

    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($nombre,$precio,$cantidad)
    {
        $this->nombre =$nombre;
        $this->precio =$precio;
        $this->cantidad =$cantidad;
    }


    public function getNombre(){

        return $this-> nombre;

    }

    public function getPrecio(){

        return $this -> precio;


    }

    public function getCantidad(){

        return $this -> cantidad;

    }


}






class ProductoImportado extends Producto
{

    private $impuestoAdicional;

    public function __construct ($nombre,$precio,$cantidad,$impuestoAdicional) {

        
        parent:: __construct ($nombre,$precio,$cantidad);

        $this->impuestoAdicional = $impuestoAdicional;


    }

  
    public function calcularPrecioFinal(){

        return

        $this->getCantidad() * $this-> getPrecio() * $this-> impuestoAdicional; 


    }
}



$Miproducto = New Producto(" Pescao "," 14 bolivares "," No se ");


echo $Miproducto -> getNombre(). " es el nombre del producto \n". $Miproducto -> getPrecio(). " es el precio del producto \n". $Miproducto -> getCantidad() . "\n";


$PImport = New ProductoImportado("Papa", 2,6,1.21);


echo $PImport -> calcularPrecioFinal(). " Es el precio final del producto ";













?>