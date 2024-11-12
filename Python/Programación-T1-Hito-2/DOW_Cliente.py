#DEF FUNCION PARA INTRODUCIR CLIENTE A BASE DE DATOS
def ingresar_cliente(conexion, cursor):
    try:
        # SOLICITO ATRIBUTOS DE LA TABLA CLIENTE
        idcliente = int(input("Seleccione su id: "))
        Nombre = input("Ingrese su nombre: ")
        ciudad = input("Dime la ciudad del nuevo cliente: ")
        tlf = input("Ingrese su número de teléfono: ")

        # LOS INSERTO EN SENTENCIA SQL Y EJECUTO
        consulta = "INSERT INTO cliente(idcliente, Nombre, ciudad, tlf) VALUES (%s, %s, %s, %s)"
        cursor.execute(consulta, (idcliente, Nombre, ciudad, tlf))

        conexion.commit()

        # GUARDO LA INSERCION EN UN ARRAY, Y ESTE LO PRINTEO EN UN ARCHIVO
        array = [idcliente, Nombre, ciudad, tlf]
        with open("Clientes.txt", "a") as archivo:
            archivo.write("=== Lista de Clientes ===\n")
            archivo.write("Datos insertados:\n\n")
            for dato in array:
                archivo.write(f"{dato}\n")

        print(f"Se insertó en la base de datos el cliente: {Nombre} de la ciudad: {ciudad} con el número {tlf}")

        #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error {unknown}")

# DEF FUNCION PARA SELECCIONAR TODOS LOS CLIENTES RECOGIDOS (SOLO HACE FALTA CURSOR PORQUE ES SENTENCIA DE TIPO SELECT)
def select_clientes(cursor):
    try:
        # CONSULTO A TODOS LOS CLIENTES DE LA TABLA ORDENANDOLOS POR EL ID A TRAVES DE SENTENCIA SQL
        consulta = "SELECT * FROM cliente ORDER BY idcliente"
        cursor.execute(consulta)

        # PRINTEO A LOS CLIENTES RECOGIDOS
        resultado = cursor.fetchall()
        for fila in resultado:
            print(f"IDCliente: {fila[0]}, Nombre: {fila[1]}, Ciudad: {fila[2]}, Teléfono: {fila[3]}")

        #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error {unknown}")

# FUNCION PARA SELECCIONAR CLIENTE INDIVIDUAL (SENTENCIA SELECT POR LO QUE NO HACE FALTA CONEXION)
def select_cliente(cursor):
    try:
        # PIDO ID PARA SACAR SUS DATOS
        idcliente = int(input("Dime el ID del cliente que quieres seleccionar: "))

        # EXTRAIGO CADA DATO DEL CLIENTE CON EL ID DADO
        consulta = "SELECT * FROM cliente WHERE idcliente = %s ORDER BY idcliente"
        cursor.execute(consulta, (idcliente,))

        # LOS IMPRIMO
        resultado = cursor.fetchall()
        for fila in resultado:
            print(f"IDCliente: {fila[0]}, Nombre: {fila[1]}, Ciudad: {fila[2]}, Teléfono: {fila[3]}")

        #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error {unknown}")

# DEF FUNCION PARA MOSTRAR LOS DATOS DE LAS COMPRAS O PEDIDOS DE UN SOLO CLIENTE
def seguimiento_cliente(cursor):
    try:
        # PIDO SU ID
        idcliente = int(input("Introduce el ID del cliente para realizar un seguimiento: "))

        # INNER JOINS DE LAS TABLAS DE LAS QUE SELECCIONO TODOS LOS DATOS SOBRE EL CLIENTE Y SUS PEDIDOS
        consulta = """
        SELECT c.idcliente, c.Nombre, c.ciudad, c.tlf, p.idpedido, prod.nombre, d.precio, d.unidades
        FROM cliente c
        JOIN pedido p ON c.idcliente = p.idcliente
        JOIN detalle d ON d.idpedido = p.idpedido
        JOIN producto prod ON prod.idproducto = d.idproducto
        WHERE c.idcliente = %s
        ORDER BY p.idpedido
        """
        #EJECUTO
        cursor.execute(consulta, (idcliente,))

        # LOS PRINTEA
        resultado = cursor.fetchall()
        for fila in resultado:
            print(f"ID Cliente: {fila[0]}")
            print(f"Nombre: {fila[1]}")
            print(f"Ciudad: {fila[2]}")
            print(f"Teléfono: {fila[3]}")
            print(f"Pedido ID: {fila[4]}")
            print(f"Producto: {fila[5]}, Precio: {fila[6]}, Cantidad: {fila[7]}\n")

        #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Error en la entrada de datos: {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error: {unknown}")