#DEF FUNNCION PARA LA COMPRA DE PRODUCTO
def compra_producto (conexion,cursor):
    try:
        while True:
            try:
                #PRIMERO ME ASEGURO DE QUE EXISTA EL CLIENTE QUE VA  A COMPRAR 
                cliente=input("Se encuentra en la base de datos? Si/No")
                if cliente.lower() == "si":
                    print("Inicio de sesión")
                    idcliente=int(input("Introduzca su id de cliente"))

                    #SELECCIONO HIPOTETICO CLIENTE CON LA ID QUE ME DAN
                    consulta = "SELECT * FROM cliente WHERE idcliente = %s"
                    cursor.execute(consulta, (idcliente,))
                    resultado = cursor.fetchone()

                    #SI SE PUEDE REALIZAR LA CONSULTA, LUEGO EXISTE CLIENTE
                    if resultado:  
                        print(f"Bienvenido!")  
                        break
                    #SINO,
                    else:
                        print("El ID de cliente no existe en la base de datos.")
                #PERMITO REGISTRO SI NO ESTA REGISTRADO EN LA DB
                else:
                    idcliente=int(input("Ingrese su idcliente"))
                    Nombre=input("Ingrese su nombre: ")
                    ciudad=(input("Ingrese su ciudad: "))
                    tlf=input("Ingrese su telefono")

                    #EJECUTO CONSULTA CON LOS DATOS DADOS
                    consulta="insert into cliente(idcliente,Nombre,ciudad,tlf) values(%s,%s,%s,%s)"

                    cursor.execute(consulta,(idcliente,Nombre,ciudad,tlf))

                    conexion.commit()

                    #GUARDO AL CLIENTE EN EL TXT COMO ARRAY UNA VEZ SE REGISTRE

                    array = [idcliente, Nombre, ciudad, tlf]
                    with open("Clientes.txt", "a") as archivo:
                        archivo.write("=== Lista de Clientes ===\n")
                        archivo.write("Datos insertados:\n\n")
                        for dato in array:
                            archivo.write(f"{dato}\n")
                    print(f"Se insertó el cliente: {Nombre}\n con el id: {idcliente}\n la ciudad: {ciudad}\n y el telefono {tlf}")
                    break
                        



             #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
            except ValueError as e:
                print(f"Tipo de dato incorrecto, error {e}")
            except Exception as unknown:
                print(f"No pudo ejecutarse la función, error {unknown}")

        while True:
            try: 
                idcliente=int(input("Cual es su id de cliente?\n"))


                lista= "select idproducto,Nombre,precio from producto"

                cursor.execute(lista)

                resultado=cursor.fetchall()
                for idproducto, nombre,precio in resultado:
                    print(f"IDProducto: {idproducto}, Nombre: {nombre}, Precio: {precio}")

                fechapedido= input("En qué fecha realizó este pedido")
                fechaentrega= input("Qué día la recibe")

                #INSERT INTO EN PEDIDO ANTES DE COMPRA
                consulta1=("insert into pedido(idcliente,fechapedido,fechaentrega) values(%s,%s,%s)")
                
                cursor.execute(consulta1,(idcliente,fechapedido,fechaentrega))

                conexion.commit()
                            
                #INTRODUCCIÓN DE DATOS NECESARIOS PARA ASIGNARLOS A LOS REGISTROS DE LA TABLA DETALLE
                unidades = int(input("Cuántas unidades deseas comprar del producto al que echo un ojo?"))
                idproducto = int(input("De nuestros productos disponibles, introduce el id de aquel que quiera comprar:\n"))

                # OBTENCIÓN DEL PRECIO DEL PRODUCTO SELECCIONADO
                consulta2 = "select precio from producto where idproducto = %s"
                cursor.execute(consulta2, (idproducto,))  

                resultado = cursor.fetchall()

                

                precio_compra = resultado[0][0]    
                 
                    

                #INSERT INTO EN DETALLE PARA COMPRA
                consulta3=("insert into detalle(idproducto,precio,unidades) values(%s,%s,%s)")

                cursor.execute(consulta3,(idproducto,precio_compra,unidades))

                conexion.commit()

                print(f"Se realizó la compra de: {idproducto} con el coste: {precio_compra}, y la cantidad: {unidades}")

                array=[f"El cliente con el id:{idcliente}Y el nombre:{Nombre},Realizo la compra del producto con el id:{idproducto} ,A un precio de:{precio_compra} En la cantidad de :{unidades}"]
                
                #ARCHIVO TXT PARA INTRODUCIR LOS DATOS DE COMPRA
                with open("Factura.txt", "a") as archivo:
                    archivo.write("=== Factura de Compra ===\n")

                    archivo.write("Detalles de la compra:\n\n")
                
                    for dato in array:
                        archivo.write(f"{dato}\n")

                #PREGUNTO SI DESEA CONTINUAR CON LA COMPRA
                continuar=input("Deseas seguir comprando? Si/No\n")

                if continuar.lower() =="si":
                    print("Siguiente compra")
                elif continuar.lower() =="no":
                    break
                
            #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
            except ValueError as e:
                print(f"Tipo de dato incorrecto, error {e}")
            except Exception as unknown:
                print(f"No pudo ejecutarse la función, error {unknown}")
        
    #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except Exception as e:
        print(f"Error en la función 'compra_producto': {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la función, error {unknown}")

#DEF FUNCION PARA SELECCIONAR TODOS LOS PRODUCTOS
def select_productos (cursor):
    try:
        #EJECUTO SELECT ALL DE PRODUCTOS 
        consulta="select * from producto order by idproducto"


        cursor.execute(consulta)

        #PRINTEA LOS RESULTADOS DE LA CONSULTA
        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDProducto: {fila[0]}, Nombre: {fila[1]},  Precio: {fila[2]},")

       
    #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF FUNCION PARA SELECCIONAR UNO SOLO
def select_producto (cursor):
    try:
        #EJECUTO SELECT PARA ENSEÑAR TODOS LOS PRODUCTOS Y POSTERIORMENTE ELEGIR Y EJECUTO
        lista= "select idproducto,nombre,from producto"

        cursor.execute(lista)

        #PRINTEO RESULTADOS 
        resultado=cursor.fetchall()
        for idproducto, nombre,precio in resultado:
            print(f"IDProducto: {idproducto}, Nombre: {nombre}")

        #PREGUNTO EL ID DEL PRODUCTO DEL QUE QUIERE SABER EL PRECIO Y EJECUTO CON EL DATO 
        idproducto=int(input("Que id tiene el producto del que deseas informacion?"))

        consulta="select * from producto where idproducto=%s"

        cursor.execute(consulta,(idproducto,))

        #PRINTEO LOS RESULTADOS ASOCIADOS A LA CONSULTA SQL PREVIA
        resultado=cursor.fetchall()
        for idproducto, nombre,precio in resultado:
            print(f"IDProducto: {idproducto}, Nombre: {nombre}, Precio: {precio}")


    #LOS MISMOS ERRORES (DATA TYPE ERRONEO Y OTROS ERRORES VARIOS POSIBLES)
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")


