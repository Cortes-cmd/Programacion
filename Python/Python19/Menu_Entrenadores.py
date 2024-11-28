#LE DOY ACCESO DE FUNCIONES CON ENTRENADORES PARA ACCEDER A ELLAS VIA MENU ENTRENADORES
import DAO_Entrenadores as de

def Menu (conexion,cursor):
    try:
        while True:
            #PLANTEO OPCION DE LA QUE MOSTRAR LAS OPCIONES

            opcion=int(input("Menú de opciones \n1/Insertar nuevo Entrenador/a\n2/Seleccionar todos los Entrenadores\n3/Modificar ficha de Entrenador/a\n4/Eliminar Entrenador/a\n5/Salir"))
            match opcion:
                case 1: 
                    print("Insertar Entrenador")
                    de.insert_entrenador(conexion,cursor)
                case 2:
                    print("Seleccionar a todos los Entrenadores")
                    de.select_entrenadores(cursor)
                case 3:
                    print("Modificar Entrenador")
                    de.modify_entrenador(conexion,cursor)
                case 4:
                    print("Eliminar Entrenador")
                    de.delete_entrenador(conexion,cursor)
                case 5:
                    print("Saliendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")