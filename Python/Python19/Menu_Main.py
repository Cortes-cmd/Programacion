import Menu_Cliente as MC

import Menu_Entrenadores as ME

import Menu_Inscripciones as MI

import Menu_Actividades as MA
#IMPORTACION DE CADA MENU AL MAIN 

def Menu (conexion,cursor):
    try:
        while True:
            #MUESTRO OPCIONES PARA PLANTEAR LAS POSIBLES OPCIONES
            opcion=int(input("Menú de opciones\n1/Gestión de Clientes\n2/Gestión de Actividades\n3/Gestión de Entrenadores\n4/Gestión de Inscripciones\n5/Salir del programa\n"))
            match opcion:
                case 1: 
                    print("Gestión de Clientes")
                    MC.Menu(conexion,cursor)
                case 2:
                    print("Gestión de Actividades")
                    MA.Menu(conexion,cursor)
                case 3:
                    print("Gestión de Entrenadores")
                    ME.Menu(conexion,cursor)
                case 4:
                    print("Gestión de Inscripciones")
                    MI.Menu(conexion,cursor)
                case 5:
                    print("Saliendo del programa")
                    cursor.close()
                    conexion.close()
                    break

    #ERRORES
    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")