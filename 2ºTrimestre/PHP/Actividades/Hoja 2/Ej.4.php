<?php
error_reporting(E_ALL);

$Nombres=["Rubén", "Marta","Ronaldo","Rebeca","Pablo","Paula", "Fernando","Fernanda"];

$Apellidos=["Fernandez", "Olmo", "Robledo","Martinez","Gallardo","Díaz","Dominguez","Faustino"];

$nºAa=rand(0,7);

$nºAb=rand(0,7);

$Nombre= $Nombres[$nºAa];

$Apellido = $Apellidos[$nºAb];

echo "Tu nombre es :".$Nombre ."\n";

echo "Tu apellido es: ".$Apellido. "\n";










?>