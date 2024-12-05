# IMPORTO DOW PRODUCTO PARA USARLO EN LOS DISTINTOS CASES
import DAO_Producto as dwp

# DEFINO MENU
def Menu(conexion, cursor):
    try:
       
        while True:
            # OPCIONES
            opcion = int(input("Menú de opciones \n1/Comprar producto\n2/Seleccionar todos los productos\n3/Seleccionar un producto en particular\n4/Salir"))
            
            # SEGUN LA OPCION UNA FUNCION PARA LA NECESIDAD CORRESPONDIENTE
            match opcion:
                case 1: 
                    print("Comprar producto")
                    dwp.compra_producto(conexion, cursor)
                case 2:
                    print("Seleccionar todos los productos")
                    dwp.select_productos(cursor)
                case 3:
                    print("Seleccionar producto")
                    dwp.select_producto(cursor)
                case 4:
                    print("Marchando al menu principal")
                    break

    except ValueError as e:
        # ERROR SI EL TIPO DE DATO NO ES VALIDO
        print(f"No aplica ese valor, error {e}")
    except Exception:
        # ERROR PARA CUALQUIER OTRO TIPO DE FALLO
        print("Error al ejecutar la funcion")