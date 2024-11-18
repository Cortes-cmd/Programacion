import DAO_Inscripciones as di

#DEF MENU PEDIDO
def Menu (conexion,cursor):
    try:
        while True:
            #PLANTEO OPCION DE LA QUE MOSTRAR LAS OPCIONES
            opcion=int(input("Menú de opciones \n1/Realizar inscripción\n2/Seleccionar todas las inscripciones\n3/Modificar inscripción\n4/Eliminar inscripción\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar inscripción")
                    di.hacer_inscripcion(conexion,cursor)
                case 2:
                    print("Seleccionar todas las inscripciones")
                    di.select_inscripciones(cursor)
                case 3:
                    print("Modificar inscripción")
                    di.modify_inscripcion(conexion,cursor)
                case 4:
                    print("Eliminar inscripción")
                    di.delete_inscripcion(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    
    #ERRORES
    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")