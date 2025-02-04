<?php
error_reporting(E_ALL);

Class personaje{

    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;

    public function atacar(Personaje $objetivo){

        #Imprimo ataque al objetivo
        echo "{$this->nombre} Se dispone a atacar a \n {$objetivo->nombre}, restándole {$this->puntosAtaque} de vida";

        #Resto puntos de vida del objetivo a razón de los de ataque
        $objetivo->puntosVida -= $this->puntosAtaque;

        #No permito que llegue por debajo de 0 para evitar valores negativos
        if ($objetivo->puntosVida<0) {
            $objetivo->puntosVida==0;
        }
    }

    public function curarse(){

        #Establezco curación que deseo aplicar

        $curacion = 20;

        #Printeo 
        echo "{$this->nombre} ha decidido sanarse a sí mismo\n";

        $this->puntosVida += $curacion;
        
        if ($this->puntosVida>100) {
            $this-> puntosVida = 100;

        }


        echo "{$this->nombre} se ha curado {$curacion} puntos!! \n Obteniendo actualmente {$this->puntosVida} \n";

    }

    public function subirNivel(){

        $this->nivel++;
        $this->puntosVida +=20;
        $this->puntosAtaque +=15;

        echo "{$this->nombre} acaba de subir al nivel {$this->nivel}\n Actualmente presenta {$this->puntosVida} puntos de vida\n Y {$this->puntosAtaque} puntos de ataque \n ";

    }

}

$Personaje1= New personaje;

$Personaje1 -> nombre = "Romualdo";
$Personaje1 -> nivel = 1;
$Personaje1 -> puntosVida = 15;
$Personaje1 -> puntosAtaque = 20;

$Personaje2 = New personaje;

$Personaje2 -> nombre ="Manoli";
$Personaje2-> nivel = 1;
$Personaje2-> puntosVida=20;
$Personaje -> puntosAtaque = 15;

$Personaje1 -> atacar($Personaje2);
$Personaje2 -> atacar($Personaje1);

$Personaje1 -> curarse();
$Personaje2 -> curarse();

$Personaje1 -> subirNivel();
$Personaje2 -> subirNivel();
















































?>