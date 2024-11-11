import Menu_Producto as Mp

import Menu_Cliente as Mc

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones\n1/Tabla Producto\n2/Tabla Cliente\n4/Salir\n"))
            match opcion:
                case 1:
                    print("Marchando al menu de Producto")
                    Mp.Menu(conexion,cursor)
                case 2:
                    print("Marchando al menu de Cliente")
                    Mc.Menu(conexion,cursor)
                case 3:
                    print("Saliendo del programa")
                    cursor.close()
                    conexion.close()
                    break


    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")