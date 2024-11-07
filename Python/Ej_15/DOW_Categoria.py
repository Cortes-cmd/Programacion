
def insert_categoria (conexion,cursor):
    try:
        idcategoria=int(input("Dime la ID de la nueva categoria: "))
        nombre= input("Ingrese el nombre de la nueva categoría: ")

        consulta="insert into categoria(idcategoria,nombre) values(%s,%s)"

        cursor.execute(consulta,(idcategoria,nombre))

        conexion.commit()

        

    except ValueError: