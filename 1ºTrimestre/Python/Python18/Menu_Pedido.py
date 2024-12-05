import DAW_Pedido as dwP

#DEF MENU PEDIDO
def Menu (conexion,cursor):
    try:
        while True:
            #PLANTEO OPCION DE LA QUE MOSTRAR LAS OPCIONES
            opcion=int(input("Menú de opciones \n1/Hacer pedido\n2/Seleccionar todos los Pedidos\n3/Modificar pedido\n4/Eliminar pedido\n5/Salir al menu principal"))
            match opcion:
                case 1: 
                    print("Insertar pedido")
                    dwP.hacer_compra(conexion,cursor)
                case 2:
                    print("Seleccionar todos los pedidos")
                    dwP.select_pedidos(cursor)
                case 3:
                    print("Modificar pedido")
                    dwP.modify_pedido(conexion,cursor)
                case 4:
                    print("Eliminar pedido")
                    dwP.delete_pedido(conexion,cursor)
                case 5:
                    print("Volviendo al menú principal")
                    break
                    
    #ERRORES
    except ValueError as e:
        print("No aplica ese valor, error{e}")
    except Exception:
        print("Error al ejecutar la funcion")