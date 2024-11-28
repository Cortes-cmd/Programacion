#DEF COMPRAR
def hacer_compra (conexion,cursor):
  
    try:
        while True:
            #PIDO DATOS
            idcliente=(input("Cual es su id de cliente?\n"))

            #MUESTRA DE PRODUCTOS Y EJECUTO
            lista= "select idproducto,Nombre,precio from producto"

            cursor.execute(lista)

            #CARGO LOS DATOS DEL CURSOR, VARIABLE POR VARIABLE
            resultado=cursor.fetchall()
            for idproducto, nombre,precio in resultado:
                print(f"IDProducto: {idproducto}, Nombre: {nombre}, Precio: {precio}")

            #PIDO DATOS 
            fechapedido= input("En qué fecha realizó este pedido AÑO/MES/DIA")
            fechaentrega= input("Qué día la recibe AÑO/MES/DIA")

            #INSERT INTO EN PEDIDO ANTES DE COMPRA Y EJECUTO
            consulta1=("insert into pedido(idcliente,fechapedido,fechaentrega) values(%s,%s,%s)")
              
            cursor.execute(consulta1,(idcliente,fechapedido,fechaentrega,))

            conexion.commit()  

            #PIDO DATOS
            unidades = int(input("Cuántas unidades deseas comprar del producto al que echo un ojo?"))
            idproducto = int(input("De nuestros productos disponibles, introduce el id de aquel que quiera comprar:\n"))
            descuento = float(input("Con qué descuento"))
            # OBTENCIÓN DEL PRECIO DEL PRODUCTO SELECCIONADO Y EJECUTO
            consulta2 = "select precio from producto where idproducto = %s"
            cursor.execute(consulta2, (idproducto,))  


            resultado = cursor.fetchall()

                    

            precio_compra = resultado[0][0]    
                    
                        

            #INSERT INTO EN DETALLE PARA COMPRA Y EJECUTO
            consulta3=("insert into detalle(idproducto,precio,unidades,descuento) values(%s,%s,%s,%s)")

            cursor.execute(consulta3,(idproducto,precio_compra,unidades,descuento))

            resultado=cursor.fetchall()

            #SELECT DE MYSQL Y EJECUTO
            consulta4="select * from pedido inner join detalle on pedido.idpedido = detalle.idpedido order by pedido.idpedido desc limit 30"

            cursor.execute(consulta4,)

            #RECOJO TODOS LOS DATOS DEL CURSOR Y POR MEDIO DE FILAS MUESTRO LAS COLUMNAS
            resultado=cursor.fetchall()
            for fila in resultado:
             print(f"IDPedido: {fila[0]}, idcliente: {fila[1]}, fecha de pedido: {fila[2]}, fecha de entrega: {fila[3]}\nDETALLE; idpedido: {fila[4]}, idproducto: {fila[5]},precio: {fila[6]}, unidades: {fila[7]}, descuento: {fila[8]}")

            conexion.commit()

            #PRINTEO PARA MOSTRAR LOS DATOS DE LA COMPRA REALIZADA
            print(f"Se realizó la compra de: {idproducto} con el coste: {precio_compra}, la cantidad: {unidades}, y con el descuento: {descuento}")
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
        
#DEF SELECCIONAR PEDIDOS
def select_pedidos (cursor):
    try:
        #SELECCIONO TODOS LOS PEDIDOS CON EL LIMITE DE 10 Y EJECUTO
        consulta="select * from pedido inner join detalle on pedido.idpedido = detalle.idpedido order by pedido.idpedido desc limit 10"


        print("Procesando consulta")

        cursor.execute(consulta)

        #MUESTRO POR FILAS LOS DATOS DE LAS COLUMNAS EN SQL
        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDPedido: {fila[0]}, idcliente: {fila[1]}, fecha de pedido: {fila[2]}, fecha de entrega: {fila[3]}\nDETALLE; idpedido: {fila[4]}, idproducto: {fila[5]},precio: {fila[6]}, unidades: {fila[7]}, descuento: {fila[8]}")

       
    #ERRORES 
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF MODIFICAR PEDIDO
def modify_pedido (conexion,cursor):
    try:
        #PIDO DATOS
        idpedido=int(input("Qué id tiene el pedido quieres modificar"))
        fechapedido=(input("Qué fecha de pedido tendría?"))
        fechaentrega=(input("Qué fecha de entrega"))
        idproducto=int(input("Cuál fue el id del producto comprado?"))
        precio=float(input("Qué precio quieres asignarle a ese pedido"))
        unidades=int(input("Cuántas unidades?"))
        descuento=float(input("Qué descuento aplicado?"))


        #CONSULTA SQL PARA CAMBIAR LOS DATOS DE PEDIDO Y DETALLE POR SEPARADO PARA EVITAR ERRORES, Y EJECUTO
        consulta_pedido=("update pedido set fechapedido=%s,fechaentrega=%s where idpedido=%s")
        consulta_detalle=("update detalle set idproducto=%s, precio=%s,unidades=%s,descuento=%s where idpedido=%s")

        cursor.execute(consulta_pedido,(fechapedido,fechaentrega,idpedido))
        conexion.commit()

        cursor.execute(consulta_detalle,(idproducto,precio,unidades,descuento,idpedido))
        conexion.commit()

        
        #PRINTEO UN AVISO DE QUE SE HAN EFECTUADO LOS DATOS REALIZADOS POST COMMIT
        print(f"El pedido de id {idpedido} fue modificada a la fecha de pedido {fechapedido}, la fecha de entrega {fechaentrega}\n Y en detalle, el idproducto {idproducto}, que cuesta {precio}, de cantidad {unidades}, y con el descuento {descuento}")

    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF ELIMINAR PEDIDO
def delete_pedido(conexion,cursor):
    try:
        #PIDO DATOS
        idpedido=int(input("Dime el id del pedido que deseas eliminar"))
    
        #CONSULTA SQL PARA ELIMINAR POR SEPARADO EVITANDO ERRORES EN LAS TABLAS Y EJECUTO
        consulta_detalle=("delete from detalle where idpedido=%s")
        cursor.execute(consulta_detalle,(idpedido,))
        consulta_pedido=("delete from pedido where idpedido= %s ")
        cursor.execute(consulta_pedido,(idpedido,))


        


        conexion.commit()

        print(f"El pedido con el id {idpedido} ha sido eliminado")
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    