import DAW_Categoria as dwc

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones \n1/Insertar nuevo registro\n2/Seleccionar todos los registros\n3/Modificar registro\n4/Eliminar categorías\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar categoria")
                    dwc.insert_categoria(conexion,cursor)
                case 2:
                    print("Seleccionar todos los registros")
                    dwc.select_categoria(conexion,cursor)
                case 3:
                    print("Modificar categoría")
                    dwc.modify_categoria(conexion,cursor)
                case 4:
                    print("Eliminar categoría")
                    dwc.delete_categoria(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")