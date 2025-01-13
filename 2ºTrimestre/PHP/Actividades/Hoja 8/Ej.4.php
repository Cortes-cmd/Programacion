<?php

error_reporting(E_ALL);

class Carrito{

    public $productos= [];

    public function agregarProducto(){

        $nombre=readline("Como se llama el producto que deseas añadir? \n");
        $precio=readline("Cuanto cuesta? \n");
        $cantidad=readline("De cuanto disponemos? \n");


        $precio = (float) $precio;
        $cantidad = (int) $cantidad;

        $producto= [

            "nombre"=> $nombre,
            "precio"=> $precio,
            "cantidad"=> $cantidad
        ];

        $this->productos[]= $producto;

        return print_r($this ->productos);
        
    }

    public function quitarProducto(){

        $nombre=readline("Como se llama el producto que deseas eliminar \n");

        foreach ($this->productos as $i =>$producto) {
            if ($producto["nombre"]==$nombre) {
               unset($this->productos[$i]);
               return "Producto eliminado\n";
            }

            else {
                echo "Producto; ". $nombre. " No encontrado\n";
            }
          
        }

    }

    public function calcularTotal(){

        echo " Calculando precio de todos los productos del carrito; \n";

        $TotalPrecio= 0;

        foreach ($this->productos as $producto) {
            $TotalPrecio+= $producto["precio"] * $producto["cantidad"];
        }

        return

        "El valor total de la cesta de productos es; \n".$TotalPrecio;



    }

    public function mostrarDetalleCarrito(){

        echo "\n El carrito tiene el siguiente contenido; \n";

        foreach ($this->productos as $i => $producto) {
            echo "Producto ". ($i + 1). ":\n";
            echo "Nombre; ". $producto["nombre"]. "\n";
            echo "Precio; ". $producto["precio"]. "\n";
            echo "Cantidad; ".$producto ["cantidad"]. "\n";

        }










    }
}



$Proceso = New Carrito;

echo$Proceso -> agregarProducto();

echo$Proceso -> quitarProducto();

echo$Proceso -> calcularTotal();

echo $Proceso -> mostrarDetalleCarrito();
?>