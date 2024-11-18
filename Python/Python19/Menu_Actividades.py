import DAO_Actividades as da

def Menu (conexion,cursor):
    try:
        while True:
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
                    print("Volviendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")