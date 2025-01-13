<?php
error_reporting(E_ALL);

class Empleado{

    public $nombre;
    public $sueldo;
    public $añosExperiencia;

    public function calcularBonus(){

        $bonus= ($this->añosExperiencia/2) * 0.05 * $this->sueldo;

        return
        "El bonus que te corresponde es; \n". $bonus."\n";

    }

    public function mostrarDetalles(){

        return
        "El empleado en cuestion consta de los siguientes datos; \n" . "Su nombre es; \n".$this->nombre. " \n Su sueldo es de; ". $this->sueldo. "\n Y sus años de experiencia; \n".$this->añosExperiencia."\n";


    }


}


class Consultor extends Empleado{

    public $horasPorProyecto;

    
    public function calcularBonus(){

        if ($this->horasPorProyecto>100) {

            $bonus= ($this->añosExperiencia/2) * 0.05 * $this->sueldo + $this->horasPorProyecto;

            return
            "El bonus que te corresponde es; \n". $bonus."\n";
        }
        else {
            $bonus= ($this->añosExperiencia/2) * 0.05 * $this->sueldo;

            return
            "El bonus que te corresponde es; \n". $bonus;
        }

       

    }




}

$trabajador1 = new Empleado;

$trabajador1 ->nombre= "Ana Belen";
$trabajador1 ->sueldo= 2340;
$trabajador1 ->añosExperiencia= 24;

echo$trabajador1 -> calcularBonus();
echo$trabajador1 -> mostrarDetalles();


$trabajador2 = new Consultor;

$trabajador2 ->nombre= "Marcelo";
$trabajador2 ->sueldo= 2340;
$trabajador2 ->añosExperiencia= 24;
$trabajador2 ->horasPorProyecto= 230;

echo$trabajador2 ->calcularBonus();
echo$trabajador2 -> mostrarDetalles();























?>