import Menu_Categoria as Mc

import Menu_Producto as Mp

import Menu_Cliente as MC

def Menu (conexion,cursor):
    try:
        while True:
            opcion=int(input("Menú de opciones\n1/Tabla Categoria\n2/Tabla Producto\n3/Tabla Cliente\n4/Salir\n"))
            match opcion:
                case 1: 
                    print("Marchando al menu de Categoria")
                    Mc.Menu(conexion,cursor)
                case 2:
                    print("Marchando al menu de Producto")
                    Mp.Menu(conexion,cursor)
                case 3:
                    print("Marchando al menu de Cliente")
                    MC.Menu(conexion,cursor)
                case 4:
                    print("Saliendo del programa")
                    cursor.close()
                    conexion.close()
                    break


    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")