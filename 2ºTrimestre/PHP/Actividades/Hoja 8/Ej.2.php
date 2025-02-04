<?php
error_reporting(E_ALL);

class Tarea{

    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function marcarComoCompletada(){

        if ($this->estado=="Pendiente") {
           $this->estado= "Completada";
           echo "Ahora el estado de la tarea es; \n". $this ->estado. "\n";
        }
        else {
            echo "\n La tarea ya habia sido completada \n ";
        }

    }

    public function editarDescripcion(){

        echo "La actual descripcion de la tarea es la siguiente; \n". $this-> descripcion."\n";

        $nuevaDescripcion = readline("Cual sera la nueva descripcion? \n");

       $this -> descripcion = $nuevaDescripcion;

       

        echo " La tarea ha cambiado a la siguiente descripcion; \n". $this-> descripcion. "\n";
    }

    public function mostrarTarea(){

        return
        "Esta tarea tiene de nombre; ". $this->nombre. " \n Su descripcion es la siguiente:; ".$this->descripcion. "\n Su fecha limite es la siguiente; ".$this->fechaLimite. "\n Y su estado; ".$this->estado. "\n";
    }
}

$t1 = New Tarea;

$t1 ->nombre= "Linguistica";
$t1 -> descripcion= "Paginas 5 y 6 ejercicios 12,13,14,15,16,17,18";
$t1 ->fechaLimite= "Hasta el 15 de enero";
$t1 ->estado = "Pendiente";

$t2 = New Tarea;

$t2 ->nombre= "Arte";
$t2 -> descripcion= "Representacion pictorica de un arbol seguido de un lago a eleccion realista";
$t2 ->fechaLimite= "Hasta el 20 de marzo";
$t2 ->estado = "Completada";

$array= [$t1,$t2];

foreach ($array as $tarea) {

    echo "\n Procesando tarea_________\n";

    $tarea -> marcarComoCompletada();
    $tarea -> editarDescripcion();
   echo $tarea -> mostrarTarea();
}














?>