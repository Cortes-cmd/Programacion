CREATE DATABASE Recetas_Cocina;

use Recetas_Cocina;

create table receta (

  id_receta int primary key not null auto_increment,
  titulo varchar(100) not null,
  ingredientes varchar(1000) not null,
  elaboracion varchar(1000) not null
);
