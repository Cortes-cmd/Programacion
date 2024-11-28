import DOW_Cliente as dwC

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones \n1/Insertar nuevo cliente\n2/Seleccionar todos los clientes\n3/Modificar cliente\n4/Eliminar cliente\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar categoria")
                    dwC.insert_cliente(conexion,cursor)
                case 2:
                    print("Seleccionar todos los registros")
                    dwC.select_cliente(cursor)
                case 3:
                    print("Modificar categoría")
                    dwC.modify_cliente(conexion,cursor)
                case 4:
                    print("Eliminar categoría")
                    dwC.delete_cliente(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")