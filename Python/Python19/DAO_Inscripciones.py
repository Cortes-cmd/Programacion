#IMPORTO PRETTYTABLE PARA MOSTRAR UNA FORMA ESTÉTICA DE TABLA CON COMPONENTES ASCII
from prettytable import PrettyTable

table=PrettyTable()

#DEF COMPRAR
def hacer_inscripcion (conexion,cursor):
  
    try:
        while True:

            #PRINTEO LISTA DE CLIENTES PARA QUE SE PUEDA ELEGIR A CUÁLES DESEAS INCLUIR EN LAS INSCRIPCIONES PIDO DATOS, Y EJECUTO

            print("Lista de clientes")

            consulta1="select * from clientes order by id_cliente"

            cursor.execute(consulta1)

            resultado=cursor.fetchall()
            for fila in resultado:
             print(f"IDCliente: {fila[0]}\n Nombre: {fila[1]}\n edad :{fila[2]}\n tipo de membresía: {fila[3]}")

            id_cliente=int(input("Cuál es su id del cliente inscrito?\n"))

            #PRINTEO LISTA ACTIVIDADES PARA ELEGIR A QUÉ ACTIVIDAD DESEA LA PERSONA INSCRIBIRSE EJECUTO VIA SQL LA LISTA, PIDO DATOS, Y EJECUTO

            print("Lista de actividades")

            consulta2="select * from actividades inner join entrenadores on entrenadores.id_entrenador = actividades.id_entrenador order by id_actividad"

            cursor.execute(consulta2)

            resultado=cursor.fetchall()
            for fila in resultado:
             print(f"IDActividad: {fila[0]}\n Nombre: {fila[1]}\n Horario: {fila[2]}\n Duración: {fila[3]}\n Entrenador a cargo {fila[6]}")


            id_actividad=int(input("Cuál es el id de la actividad a la que desea inscribirse?"))

            consulta1=("insert into inscripciones(id_cliente,id_actividad) values(%s,%s)")
              
            cursor.execute(consulta1,(id_cliente,id_actividad))

            conexion.commit()  

            print(" Inscripción registrada exitosamente :) .")


            #MUESTRA DE PRODUCTOS Y EJECUTO
            lista_inscripciones= "select id_cliente,id_actividad from inscripciones order by id_inscripcion"

            cursor.execute(lista_inscripciones)

            #CARGO LOS DATOS DEL CURSOR, VARIABLE POR VARIABLE
            resultado=cursor.fetchall()
            for id_cliente, id_actividad in resultado:
                print(f"Idcliente inscrito: {id_cliente}, id de la actividad a la que se inscribe {id_actividad}")

            #PREGUNTO SI DESEA CONTINUAR CON LA INSERCIONE
            continuar=input("Deseas seguir insertando? Si/No\n")

            if continuar.lower() =="si":
                print("Siguiente compra")
            elif continuar.lower() =="no":
                break
                
    #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error {unknown}")
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
#DEF SELECCIONAR INSCRIPCIONES   
def select_inscripciones (cursor):
    try:
        #SELECCIONO TODAS LAS INSCRIPCIONES Y EJECUTO
        consulta="select * from inscripciones inner join actividades on actividades.id_actividad = inscripciones.id_actividad inner join entrenadores on entrenadores.id_entrenador = actividades.id_entrenador inner join clientes on clientes.id_cliente = inscripciones.id_cliente  order by inscripciones.id_inscripcion desc"


        print("Procesando consulta")

        cursor.execute(consulta)

        #MUESTRO POR FILAS LOS DATOS DE LAS COLUMNAS EN SQL, APLICANDO UNA FUNCIONALIDAD DE LA LIBRERIA  PRETTYTABLE
        resultado=cursor.fetchall()
        for fila in resultado:
            table.field_names=["ID Inscripción","Cliente","Actividad","Horario"]
            table.add_row([ fila[0],fila[12],fila[3],fila[4]])
            print(table)  

       
       
    #ERRORES 
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF ELIMINAR INSCRIPCIÓN
def delete_inscripcion(conexion,cursor):
    try:
        #SELECCIONO TODAS LAS INSCRIPCIONES Y EJECUTO
        consulta="select * from inscripciones inner join actividades on actividades.id_actividad = inscripciones.id_actividad inner join entrenadores on entrenadores.id_entrenador = actividades.id_entrenador inner join clientes on clientes.id_cliente = inscripciones.id_cliente  order by inscripciones.id_inscripcion desc"


        print("Procesando consulta")

        cursor.execute(consulta)

        #MUESTRO POR FILAS LOS DATOS DE LAS COLUMNAS EN SQL, APLICANDO UNA FUNCIONALIDAD DE LA LIBRERIA  PRETTYTABLE
        resultado=cursor.fetchall()
        for fila in resultado:
            table.field_names=["ID Inscripción","Cliente","Actividad","Horario"]
            table.add_row([ fila[0],fila[12],fila[3],fila[4]])
            print(table) 
            
        #PIDO DATOS
        id_inscripcion=int(input("Dime el id de la inscripción que deseas eliminar"))
    
        #CONSULTA SQL PARA ELIMINAR POR SEPARADO EVITANDO ERRORES EN LAS TABLAS Y EJECUTO
        consulta_detalle=("delete from inscripciones where id_inscripcion=%s")
        cursor.execute(consulta_detalle,(id_inscripcion,))

        


        conexion.commit()

        print(f"La inscripción con el id {id_inscripcion} ha sido eliminada")
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    