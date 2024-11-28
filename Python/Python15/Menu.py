import DOW_Categoria as dw

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones \n1/Insertar nuevo registro\n2/Seleccionar todos los registros\n3/Modificar registro\n4/Eliminar categorías\n5/Salir"))
            match opcion:
                case 1: 
                    print("Insertar categoria")
                    dw.insert_categoria(conexion,cursor)
                case 2:
                    print("Seleccionar todos los registros")
                    dw.select_categoria(conexion,cursor)
                case 3:
                    print("Modificar categoría")
                    dw.modify_categoria(conexion,cursor)
                case 4:
                    print("Eliminar categoría")
                    dw.delete_categoria(conexion,cursor)
                case 5:
                    print("Saliendo del programa")
                    cursor.close()
                    conexion.close()
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")