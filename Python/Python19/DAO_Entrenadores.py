#DEF INSERTAR PRODUCTO
def insert_entrenador (conexion,cursor):
    try:
        #PIDO DATOS
        nombre_entrenador= input("Ingrese el nombre del nuevo entrenador: \n")
        especialidad= input("Ingrese la especialidad del entrenador: Yoga - Pesas - Zumba - Boxeo - Natacion\n")

        #EJECUTO CONSULTA SQL
        consulta="insert into entrenadores(nombre_entrenador,especialidad) values(%s,%s)"
        
        cursor.execute(consulta,(nombre_entrenador, especialidad))

        consulta="select id_entrenador from entrenadores where nombre_entrenador=%s and especialidad=%s"
        cursor.execute(consulta,(nombre_entrenador,especialidad))
        resultado=cursor.fetchall()

        for linea in resultado:
                id_entrenador=linea
                id_entrenador = id_entrenador.strip()
        conexion.commit()

        print(f"Se insertó al entrenador/a: {nombre_entrenador} con el ID de entrenador/a: {id_entrenador}, que cuenta con la especialidad {especialidad}")


    #PREVEO ERRORES DATA TYPE ERROR Y OTROS
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF SELECCIONAR PRODUCTO
def select_entrenadores (cursor):
    try:
        #CONSULTA VIA SQL Y EJECUTO
        consulta="select * from entrenadores order by id_entrenador"

        print("Procesando consulta")

        cursor.execute(consulta)

        #MUESTRO EL PROCESO DE CURSOR EN UNA VARIABLE,Y LO MUESTRO POR MEDIO DE UN PRINT CON ESPECIFICACIONES POR FILAS
        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDEntrenador/a: {fila[0]} \n Nombre: {fila[1]}\n Especialidad: {fila[2]}")

       
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF MODIFICAR PRODUCTO
def modify_entrenador (conexion,cursor):
    try:
        #PIDO DATOS
        nombre_entrenador= input("Que nombre quiere asignarle al entrenador/a?: \n")
        especialidad= input("Qué especialidad cumple el entrenador a modificar: Yoga - Pesas - Zumba - Boxeo - Natacion\n")
        id_entrenador= int(input("Con qué id cumple el entrenador que deseas modificar"))

        #CONSULTA SQL Y EJECUTO
        consulta=("update entrenadores set nombre_entrenador = %s, especialidad= %s where id_entrenador=%s")

        cursor.execute(consulta,(nombre_entrenador,especialidad,id_entrenador))

        conexion.commit()
        #PRINTEO UN AVISO DE ADICIÓN
        print(f"El id del entrenador {id_entrenador} fue modificada al nombre {nombre_entrenador}, que cuenta con la especialidad {especialidad}")
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF ELIMINAR PRODUCTO
def delete_entrenador (conexion,cursor):
    try:
        #PIDO DATOS
        id_entrenador=int(input("Dime el id del entrenador/a que deseas eliminar"))

        #CONSULTA SQL Y EJECUTO
        consulta=(f"delete from entrenadores where id_entrenador= %s")

        cursor.execute(consulta,(id_entrenador,))

        conexion.commit()
        #PRINTEO EL ID QUE SE HA ELIMINADO
        print(f"El entrenador/a con el id {id_entrenador} ha sido eliminada")

    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    