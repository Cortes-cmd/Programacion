CREATE USER 'userAkihabara'@'localhost' IDENTIFIED BY 'curso';

GRANT SELECT, INSERT, UPDATE, DELETE,ALTER ON akihabara_db.producto TO 'userAkihabara'@'localhost';

GRANT CREATE ON akihabara_db.producto TO 'userAkihabara'@'localhost';

GRANT CREATE ON akihabara_db TO 'userAkihabara'@'localhost';

create database akihabara_db ;

CREATE TABLE producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    categoria set('Figura', 'Manga', 'Póster', 'Llavero', 'Ropa'),
    precio DECIMAL(10,2),
    stock INT
);

CREATE TABLE clientes (
    dni VARCHAR(15) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(20),
    fecha_registro DATE 
);

