import Menu_Categoria as Mc

import Menu_Producto as Mp

import Menu_Cliente as MC

import Menu_Pedido as MP

#IMPORTACION DE CADA MENU AL MAIN 

def Menu (conexion,cursor):
    try:
        while True:
            #MUESTRO OPCIONES PARA PLANTEAR LAS POSIBLES OPCIONES
            opcion=int(input("Menú de opciones\n1/Tabla Categoria\n2/Tabla Producto\n3/Tabla Cliente\n4/Tabla Pedidos\n5/Salie del programa\n"))
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
                    print("Marchando al menú Pedidos")
                    MP.Menu(conexion,cursor)
                case 5:
                    print("Saliendo del programa")
                    cursor.close()
                    conexion.close()
                    break

    #ERRORES
    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")