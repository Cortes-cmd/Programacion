#IMPORTO LOS DOS MENUS PARA ENLAZARLOS AL MAIN
import Menu_Producto as Mp

import Menu_Cliente as Mc
#DEF MENU
def Menu (conexion,cursor):
    try:
        while True:
            #MUESTRO OPCIONES Y ASIGNO CADA UNA A CADA CASO POSIBLE
            opcion=int(input("Menú de opciones\n1/Tabla Producto\n2/Tabla Cliente\n3/Salir\n"))
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
        #ERROR SI TIPO DE DATO ERRONEO
        print("No aplica ese valor, error{e}")
    except Exception:
        #ERROR SI FALLA ALGUNA COSA DISTINTA
        print("Error al ejecutar la funcion")