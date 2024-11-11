import DOW_Cliente as dwC

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones \n1/Insertar nuevo cliente\n2/Seleccionar todos los clientes\n3/Seleccionar un cliente en específico\n4/Modificar cliente\n5/Eliminar cliente\n6/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar cliente")
                    dwC.insert_cliente(conexion,cursor)
                case 2:
                    print("Seleccionar a todos los cientes")
                    dwC.select_clientes(cursor)
                case 3:
                    print("Seleccionar cliente")
                    dwC.select_cliente(cursor)
                case 4:
                    print("Modificar cliente")
                    dwC.modify_cliente(conexion,cursor)
                case 5:
                    print("Eliminar cliente")
                    dwC.delete_cliente(conexion,cursor)
                    break
                case 6:
                    print("Marchando al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")