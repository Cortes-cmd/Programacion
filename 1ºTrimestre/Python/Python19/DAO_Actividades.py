#DEF INSERTAR ACTIVIDAD
def insert_actividad (conexion,cursor):
    try:
        #PIDO DATOS PARA INSERTARLOS EN LA TABLA POSTERIORMENTE Y EJECUTO
        nombre_actividad= input("Ingrese el nombre de la nueva actividad: ")
        horario=input("A qué hora surgirá la actividad: ")
        duracion=int(input("Cuál será la duración de la misma (en horas): "))

        #PRINTEO LA LISTA DE ENTRENADORES DISPONIBLES PARA QUE SE ELIJA A CÚAL IRA ASIGNADO/A LA ACTIVIDAD
        print("Lista de los entrenadores disponibles;\n")

        consulta="select * from entrenadores order by id_entrenador"

        cursor.execute(consulta)

        #PRINTEO LOS DATOS CON BUCLE FOR DEL ENTRENADOR, EN EL CASO DEL IDENTRENADOR, PARA MOSTRARLO POSTERIORMENTE EN EL PRINT FINAL
        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDEntrenador/a: {fila[0]} \n Nombre: {fila[1]}\n Especialidad: {fila[2]}")

        #ESTABLEZCO LA CONSULTA PARA INSERTAR A UN ENTRENADOR EN ESTA MISMA TABLA, Y EJECUTO

        id_entrenador=int(input("Cuál es el id del entrenador/a asociado/a"))

        consulta="insert into actividades(nombre_actividad,horario,duracion,id_entrenador) values(%s,%s,%s,%s)"

        cursor.execute(consulta,(nombre_actividad,horario,duracion,id_entrenador))

        conexion.commit()

        print(f"Se insertó la actividad : {nombre_actividad} de que sucede a la hora: {horario}, de duración: {duracion}, con el entrenador de id {id_entrenador}")


    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
#DEF SELECCIONAR TODAS LAS ACTIVIDADES ESTABLECIDAS
def select_actividades (cursor):
    try:
        #ESTABLEZCO LA CONSULTA SQL PARA MOSTRAR TODOS LOS DATOS DE LAS ACTIVIDADES EN PARTICULAR
        consulta="select * from actividades inner join entrenadores where entrenadores.id_entrenador = actividades.id_entrenador order by id_actividad"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"ID de la actividad: {fila[0]}, Nombre : {fila[1]}, Horario : {fila[2]}, Duración : {fila[3]}, ID del entrenador a cargo : {fila[4]}, Nombre del entrenador/a : {fila[6]}, Especialidad de este/a {fila[7]}")

       
    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF MODIFICAR ACTIVIDAD
def modify_actividad (conexion,cursor):
    try:
        #PREGUNTO AQUELLAS ÁREAS QUE PODRÍAN SER INTERESANTES PARA SER MODIFICADAS
        nombre_actividad= input("Ingrese el nombre de la actividad que desea modificar: ")
        horario=input("A qué hora surgirá la actividad modificada: ")
        duracion=int(input("Cuál será la duración de la misma: "))      

        id_actividad=int(input("Selecciona el id_actividad que deseas modificar"))

        #VIA CONSULTA SQL, MODIFICO LA TABLA ACTIVIDADES Y SUS RESPECTIVOS CAMPOS, Y EJECUTO

        consulta=("update actividades set nombre_actividad = %s, horario=%s, duracion=%s where id_actividad = %s")

        cursor.execute(consulta,(nombre_actividad,horario,duracion,id_actividad))

        conexion.commit()

        print(f"La actividad de id {id_actividad} fue modificada al nombre {nombre_actividad}, que sucede a la hora {horario}, y de duración {duracion}")

    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF DELETEAR ACTIVIDAD
def delete_actividad(conexion,cursor):
    try:
        #PIDO EL ID DE LA ACTIVIDAD QUE SE DESEA ELIMINAR, LE APLICO EN LA CONSULTA SQL, Y EJECUTO
        id_actividad=int(input("Dime el id de la actividad que deseas eliminar"))
        
        consulta=("delete from actividades where id_actividad= %s")

        cursor.execute(consulta,(id_actividad,))

        conexion.commit()

        print(f"La actividad con el id {id_actividad} ha sido eliminada")
    #ERRORES DE DATA TYPE Y CUALQUIER OTRO
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    