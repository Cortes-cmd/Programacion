CREATE USER 'userAkihabara'@'localhost' IDENTIFIED BY 'curso';

GRANT SELECT, INSERT, UPDATE, DELETE,ALTER ON akihabara_db.producto TO 'userAkihabara'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE,ALTER ON akihabara_db.clientes TO 'userAkihabara'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE,ALTER ON akihabara_db.pedido TO 'userAkihabara'@'localhost';


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

select * from clientes;

CREATE TABLE clientes (
    dni VARCHAR(15) PRIMARY KEY ,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(20),
    fecha_registro DATE 
);


CREATE TABLE pedido (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    dni_cliente VARCHAR(15),
    fecha DATE,
    FOREIGN KEY (dni_cliente) REFERENCES clientes(dni)
);

CREATE TABLE detalle_pedido (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_producto INT,
    cantidad INT,
    precio DECIMAL(10, 2),
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_producto) REFERENCES producto(id)
);


