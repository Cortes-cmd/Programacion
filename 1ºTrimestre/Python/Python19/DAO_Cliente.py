import numpy as np
from pathlib import Path as path
#DEF INSERTAR CLIENTE
def insert_cliente (conexion,cursor):
    try:
        #SOLICITO DATOS PARA INGRESARLO Y EJECUTO SENTENCIA SQL PARA ELLO
        nombre=input("Ingrese el nombre del nuevo cliente: ")
        edad= int(input("Dime cuál es tu edad: "))
        tipo_membresia=input("Qué tipo de membresía posees; Mensual - Trimestral - Anual\n")

        consulta="insert into clientes(nombre, edad, tipo_membresia) values(%s,%s,%s)"

        cursor.execute(consulta,(nombre, edad, tipo_membresia))

        conexion.commit()



        archivo = path("Cliente.txt")
        
        if archivo.exists():
            archivo.unlink()
            with open(archivo,"r+") as archivo:
                archivo.readlines()
                for linea in archivo:
                    array = np.array(linea).strip()
                    nombre = array[0]
                    edad = array[1]
                    membresia = array[2]
                    edad = int(edad)
                    print(array)
                    consulta = "insert into cliente (...) values (%s,%s,%s)"
                    cursor.execute(consulta,(nombre,edad,membresia))
        else:
            
            with open("Clientes.txt", "w") as archivo:
                for fila in archivo:
                    archivo.write(",".join(map(fila))+ "\n")
                archivo.close()
  
        #SACO EL IDCLIENTE VIA SQL PORQUE ES AUTOINCREMENT, DE ESTA FORMA EN EL PRINT FINAL, PUEDO APORTAR EL IDCLIENTE COMO DATO
        consulta="select id_cliente from clientes where nombre=%s and edad=%s and tipo_membresia=%s"
        cursor.execute(consulta,(nombre,edad,tipo_membresia))
        resultado=cursor.fetchall()

        for linea in resultado:
                idcliente=linea
      




        print(f"Se insertó el cliente: {nombre}, con el idcliente: {idcliente}, la edad: {edad}, y cuyo tipo de membresía es: {tipo_membresia}")
    #ERRORES VALUE TYPE ERROR Y CUALQUIER OTRO TIPO DE ERROR
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
#DEF SELEC CLIENTES
def select_clientes (cursor):
    try:
        #SELECCIONO TODOS LOS CLIENTES VIA SQL Y EJECUTO
        consulta="select * from clientes order by id_cliente"

        cursor.execute(consulta)
        #BUCLE FOR PARA PRINTEAR LOS DATOS DE LOS DISTINTOS CLIENTES
        resultado=cursor.fetchall()
        for fila in resultado:
             print(f"IDCliente: {fila[0]}\n Nombre: {fila[1]}\n edad :{fila[2]}\n tipo de membresía: {fila[3]}")

       
    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF MODIFICAR CLIENTE
def modify_cliente (conexion,cursor):
    try:
        #PIDO DATOS PARA PODE MODIFICARLO POSTERIORMENTE VIA SELECT SQL POR MEDIO DE IDCLIENTE  Y EJECUTO
        nombre=input("Ingrese el nombre del cliente con esta id: ")
        edad= int(input("Cuál sería la edad del cliente modificado"))
        tipo_membresia=input("Qué tipo de membresía posee; Mensual - Trimestral - Anual\n")
        id_cliente=int(input("Cuál es el id del cliente que deseas modificar"))

        consulta=("update clientes set nombre= %s, edad=%s, tipo_membresia=%s where id_cliente=%s")

        cursor.execute(consulta,(nombre,edad,tipo_membresia, id_cliente))

        conexion.commit()

        print(f"El cliente de id:  {id_cliente}, fue modificado, sus datos figuran ahora de la siguiente manera; \n nombre: {nombre} \n edad: {edad}\n tipo de membresia: {tipo_membresia}")

    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF DELETEAR CLIENTE
def delete_cliente(conexion,cursor):
    try:
        #SELECCIONO A LOS CLIENTES ORDENADOS POR SU ID PARA QUE SE PUEDA ELEGIR A CUÁL DESEAS ELIMINAR SEGÚN EL IDCLIENTE Y EJECUTO
        print("A continuación, te muestro la lista de los distintos clientes;\n ")

        consulta="select * from clientes order by id_cliente"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
         print(f"IDCliente: {fila[0]}\n Nombre: {fila[1]}\n edad :{fila[2]}\n tipo de membresía: {fila[3]}")

        id_cliente=(input("Dime el id del cliente que deseas eliminar"))
        
        consulta=("delete from inscripciones where id_cliente= %s;")

        cursor.execute(consulta,(id_cliente,))

        conexion.commit()

        consulta=("delete from clientes where id_cliente= %s;")

        cursor.execute(consulta,(id_cliente,))


        
        

        conexion.commit()

        print(f"El cliente con el id {id_cliente} ha sido eliminado")
    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    