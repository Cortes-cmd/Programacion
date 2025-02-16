CREATE DATABASE hito_2_2ºTrimestre_Alejandro_Cortes_Diaz

use hito_2_2ºTrimestre_Alejandro_Cortes_Diaz

create table usuario(
email varchar (250) primary key,
nombre varchar (250),
passwd VARCHAR(250)
);

CREATE TABLE tarea (
  id_tarea INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(250),
  titulo VARCHAR(250),
  descripcion VARCHAR(500),
  estado SET ("Pendiente", "En proceso", "Bloqueada", "Finalizada"),
  FOREIGN KEY (email) REFERENCES usuario(email)
);