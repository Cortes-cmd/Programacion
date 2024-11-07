
def insert_categoria (conexion,cursor):
    try:
        idcategoria=int(input("Dime la ID de la nueva categoria: "))
        categoria= input("Ingrese el nombre de la nueva categoría: ")

        consulta="insert into categoria(idcategoria,categoria) values(%s,%s)"

        cursor.execute(consulta,(idcategoria,categoria))

        conexion.commit()

        print(f"Se insertó la categoria: {categoria} de ID: {idcategoria}")



    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

def select_categoria (conexion,cursor):
    try:
        consulta="select categoria, idcategoria from categoria order by idcategoria"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"ID: {fila[1]}, Nombre: {fila[0]}")

       

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")


def modify_categoria (conexion,cursor):
    try:
        idcategoria=int(input("Selecciona el idcategoria que deseas modificar"))
        categoria=(input("Dime que nombre quieres darle a la categoria"))

        consulta=(f"update categoria set categoria = %s where idcategoria = %s")

        cursor.execute(consulta,(categoria,idcategoria))

        conexion.commit()

        print(f"La categoria de id {idcategoria} fue modificada al nombre {categoria}")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

    
def delete_categoria(conexion,cursor):
    try:
        idcategoria=int(input("Dime el id de la categoria que deseas eliminar"))
        
        consulta=(f"delete from categoria where idcategoria= %s")

        cursor.execute(consulta,(idcategoria,))

        conexion.commit()

        print(f"La categoria con el id {idcategoria} ha sido eliminada")
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    