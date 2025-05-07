Create table categoria (
id_categoria int primary key,
cat varchar (50)
);

Create table pelicula (
id_pelicula int primary key,
Titulo varchar (50),
Valoraciones varchar(50),
id_categoria int,
Lanzamiento date,
Foreign key (Categoria) references Categoria(id_categoria)
);