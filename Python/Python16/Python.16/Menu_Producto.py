import DOW_Producto as dwp

import Menu_Main as Mm

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones \n1/Insertar nuevo producto\n2/Seleccionar todos los productos\n3/Modificar producto\n4/Eliminar producto\n5/Salir"))
            match opcion:
                case 1: 
                    print("Insertar producto")
                    dwp.insert_producto(conexion,cursor)
                case 2:
                    print("Seleccionar todos los productos")
                    dwp.select_producto(conexion,cursor)
                case 3:
                    print("Modificar producto")
                    dwp.modify_producto(conexion,cursor)
                case 4:
                    print("Eliminar producto")
                    dwp.delete_producto(conexion,cursor)
                case 5:
                    print("Saliendo al menú principal")
                    break
                    

    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")