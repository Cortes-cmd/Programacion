
def insert_cliente (conexion,cursor):
    try:
        nombre=input("Ingrese el nombre del nuevo cliente: ")
        edad= int(input("Dime cuál es tu edad: "))
        tipo_membresia=input("Qué tipo de membresía posees; Mensual - Trimestral - Anual\n")

        consulta="insert into clientes(nombre, edad, tipo_membresia) values(%s,%s,%s)"

        cursor.execute(consulta,(nombre, edad, tipo_membresia))

        conexion.commit()
        
        consulta="select id_cliente from clientes where nombre=%s and edad=%s and tipo_membresia=%s"
        cursor.execute(consulta,(nombre,edad,tipo_membresia))
        resultado=cursor.fetchall()

        for linea in resultado:
                idcliente=linea
      




        print(f"Se insertó el cliente: {nombre}, con el idcliente: {idcliente}, la edad: {edad}, y cuyo tipo de membresía es: {tipo_membresia}")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

def select_clientes (cursor):
    try:
        consulta="select * from clientes order by id_cliente"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
             print(f"IDCliente: {fila[0]}\n Nombre: {fila[1]}\n edad :{fila[2]}\n tipo de membresía: {fila[3]}")

       

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")


def modify_cliente (conexion,cursor):
    try:
        nombre=input("Ingrese el nombre del cliente con esta id: ")
        edad= int(input("Cuál sería la edad del cliente modificado"))
        tipo_membresia=input("Qué tipo de membresía posee; Mensual - Trimestral - Anual\n")
        id_cliente=int(input("Cuál es el id del cliente que deseas modificar"))

        consulta=("update clientes set nombre= %s, edad=%s, tipo_membresia=%s where id_cliente=%s")

        cursor.execute(consulta,(nombre,edad,tipo_membresia, id_cliente))

        conexion.commit()

        print(f"El cliente de id:  {id_cliente}, fue modificado, sus datos figuran ahora de la siguiente manera; \n nombre: {nombre} \n edad: {edad}\n tipo de membresia: {tipo_membresia}")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

    
def delete_cliente(conexion,cursor):
    try:

        print("A continuación, te muestro la lista de los distintos clientes;\n ")

        consulta="select * from clientes order by id_cliente"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
             print(f"IDCliente: {fila[0]}\n Nombre: {fila[1]}\n edad :{fila[2]}\n tipo de membresía: {fila[3]}")

        id_cliente=(input("Dime el id del cliente que deseas eliminar"))
        
        consulta=(f"delete from clientes where id_cliente= %s;")
        cursor.execute(consulta,(id_cliente,))


        
        

        conexion.commit()

        print(f"El cliente con el id {id_cliente} ha sido eliminado")
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    