<?php
error_reporting(E_ALL);

class Libro{

 public $titulo;
 public $autor;
 public $numero_paginas;

 public function mostrarinfo(){

    return "Informacion del libro" . $this->titulo . $this->autor . $this->numero_paginas;

 }

}

$POUNLIBROMAH= new $Libro();
$POUNLIBROMAH -> $titulo = "Demasiado añejo para estar sobrio de algo";
$POUNLIBROMAH -> $autor = "PapaJohns";
$POUNLIBROMAH -> $numero_paginas= "1024";


$POUNLIBROMAH -> mostrarinfo();







?>