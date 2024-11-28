#LE DOY ACCESO DE FUNCIONES CON CLIENTES PARA ACCEDER A ELLAS VIA MENU CLIENTES
import DAO_Cliente as dc

def Menu (conexion,cursor):
    try:
        while True:
            #PLANTEO OPCION DE LA QUE MOSTRAR LAS OPCIONES
            opcion=int(input("Menú de opciones \n1/Insertar nuevo cliente\n2/Seleccionar todos los clientes\n3/Modificar cliente\n4/Eliminar cliente\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar cliente")
                    dc.insert_cliente(conexion,cursor)
                case 2:
                    print("Seleccionar todos los clientes")
                    dc.select_clientes(cursor)
                case 3:
                    print("Modificar cliente")
                    dc.modify_cliente(conexion,cursor)
                case 4:
                    print("Eliminar cliente")
                    dc.delete_cliente(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    
    #ERRORES
    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")