#LE DOY ACCESO DE FUNCIONES CON ACTIVIDADES PARA ACCEDER A ELLAS VIA MENU ACTIVIDADES
import DAO_Actividades as da

def Menu (conexion,cursor):
    try:
        while True:
            #MUESTRO LAS OPCIONES POSIBLES PARA OPERAR CON LA TABLA
            opcion=int(input("Menú de opciones \n1/Insertar nueva actividad\n2/Seleccionar todas las actividades\n3/Modificar actividad\n4/Eliminar actividad\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar categoria")
                    da.insert_actividad(conexion,cursor)
                case 2:
                    print("Seleccionar todas las actividades")
                    da.select_actividades(cursor)
                case 3:
                    print("Modificar categoría")
                    da.modify_actividad(conexion,cursor)
                case 4:
                    print("Eliminar actividad")
                    da.delete_actividad(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")