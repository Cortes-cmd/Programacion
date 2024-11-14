# IMPORTO CLIENTE PARA USARLO EN EL MENU
import DAW_Cliente as dwC

# DEF MENU
def Menu(conexion, cursor):
    try:
        while True:
            # MUESTRO OPCIONES
            opcion = int(input("Menú de opciones \n1/Insertar nuevo cliente\n2/Seleccionar todos los clientes\n3/Seleccionar un cliente en específico\n4/Seguimiento de cliente \n5/Salir al menu principal"))
            
            # ASIGNO UNA OPCION A CADA FUNCION CON MATCH CASE CORRESPONDIENTE
            match opcion:
                case 1: 
                    print("Insertar cliente")
                    dwC.ingresar_cliente(conexion, cursor)
                case 2:
                    print("Seleccionar a todos los clientes")
                    dwC.select_clientes(cursor)
                case 3:
                    print("Seleccionar cliente")
                    dwC.select_cliente(cursor)
                case 4:
                    print("Seguimiento de cliente")
                    dwC.seguimiento_cliente(cursor)
                case 5:
                    print("Marchando al menú principal")
                    break

    #ERROR SI TIPO DE DATO NO ES CORRECTO
    except ValueError as e:
        print(f"No aplica ese valor, error {e}")
    except Exception:
        #ERROR SI SE DA OTRO TIPO DE FALLO
        print("Error al ejecutar la función")