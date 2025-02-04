<?php

Class Usuario{
    
    protected $nombre;
    protected $email;
    
    
    public function __construct($nombre,$email)
    {
    
        $this->nombre = $nombre;
        $this->email = $email;
    
    
    
    
    
    
    }

    public function mostrarInfo(){

        return
         "\nEste usuario tiene los siguientes datos: Nombre; \n{$this->nombre}\n Email; \n{$this->email}";

    }

}


class Administrador extends Usuario{
    protected $nivelAcceso;

    public function __construct($nombre,$email,$nivelAcceso)
    {
    
        parent :: __construct($nombre,$email);
        $this->nivelAcceso = $nivelAcceso;
        
    }

    public function mostrarInfo()
    {
        return "\nEste usuario tiene los siguientes datos: Nombre; \n{$this->nombre}\n Email; \n{$this->email}\n Nivel de acceso;\n {$this->nivelAcceso}\n";
    }



        
}

$U = New Usuario ("Thanatos", "ilrgalierhgb@gmail.com");

echo $U -> mostrarInfo();

$A = New Administrador ("Babayaga","zfigliulzgbh@gmaik.com",2);

echo $A ->mostrarInfo();































?>