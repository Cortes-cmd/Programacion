
def compra_producto (conexion,cursor):
    try:
        while True:
            try:
                cliente=input("Se encuentra en la base de datos? Si/No")
                if cliente.lower() == "Si":
                    print("Inicio de sesión")
                    idcliente=int(input("Introduzca su id de cliente"))
                    break
                else:
                    cia=input("Ingrese su nombre: ")
                    contacto=(input("Ingrese su contacto: "))
                    direccion=(input("Ingrese su dirección: "))
                    ciudad=(input("Ingrese su ciudad: "))
                    region=(input("Ingrese su región: "))
                    pais=(input("Ingrese su país: "))

                    consulta="insert into cliente(cia,contacto,direccion,ciudad,region,pais) values(%s,%s,%s,%s,%s,%s)"

                    cursor.execute(consulta,(cia,contacto,direccion,ciudad,region,pais))

                    conexion.commit()

                    #Faltaría crear el txt y que meta los datos en un array

                    print(f"Se insertó el cliente: {cia}\n con el nombre de contacto : {contacto}\n\n con la direccion: {direccion}\n la ciudad: {ciudad}\n la region: {region}\n que vive en el pais {pais}\n")
                        




            except ValueError as e:
                        print("Tipo de dato incorrecto, error {e}")
            except Exception as unknown:
                        print(f"No pudo ejecutarse la función, error {unknown}")

        while True:

            lista= "select idproducto,nombre,precio from producto"

            cursor.execute(lista)

            resultado=cursor.fetchall()
            for idproducto, nombre,precio in resultado:
                print(f"IDProducto: {idproducto}, Nombre: {nombre}, Precio: {precio}")

            #INSERT INTO EN PEDIDO ANTES DE COMPRA
            consulta1=("insert into pedido(idcliente) values(%s)")
            
            cursor.execute(consulta1,(idcliente,))

            conexion.commit()
                        
            #INTRODUCCIÓN DE DATOS NECESARIOS PARA ASIGNARLOS A LOS REGISTROS DE LA TABLA DETALLE
            id_producto=input("Nuestros productos disponibles, introduce el id de aquel que quiera compra:\n")
            unidades_compra=int(input("Cuántas unidades deseas comprar de ese producto"))
            #
            consulta2=("select precio from producto where id_producto= %s")
            cursor.execute(consulta2,(precio,))

            resultado= cursor.fetchall()

            for precio in resultado:

                precio_compra= precio
                

            

            #INSERT INTO EN DETALLE PARA COMPRA
            consulta3=("insert into detalle(id_producto,precio_compra,unidades_compra) values(%s,%s,%s)")

            cursor.execute(consulta3,(id_producto,precio_compra,unidades_compra))

            conexion.commit()

            print(f"Se realizó la compra de: {idproducto} con el coste: {precio_compra}, y la cantidad: {unidades_compra}")

            continuar=input("Deseas seguir comprando? Si/No\n")

            if continuar.lower() =="si":
                print("Siguiente compra")
            else:
                 break
        #Te falta hacer un archivo txt donde introducir los datos de la compra
        with open("Factura.txt", "w") as archivo:
             

        
    
            with open("numeros.txt","w") as archivo:
            array=np.random.randint(1,100, size=10)
            for numero in array:
                archivo.write(f"{numero}\n")


    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unknown:
        print(f"No pudo ejecutarse la funcion, error {unknown}")


def select_producto (cursor):
    try:
        consulta="select * from producto order by idproducto"


        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDProducto: {fila[0]}, Nombre: {fila[1]}, IDCategoria: {fila[2]}, Medida: {fila[3]}, Precio: {fila[4]}, Stock: {fila[5]}")

       

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")


def modify_producto (conexion,cursor):
    try:
        nombre= input("Que nombre quiere asignarle al producto?: \n")
        idcategoria=int(input("De que idcategoria forma parte?\n Categorias:\n 1.Bebidas\n 2.Condimentos\n 3.Reposteria\n 4.Lacteos\n 5. Granos/Cereales\n 6.Carnes Magras\n 7.Frutas/Verduras\n 8.Pescado/Marisco"))
        medida=(input("Cuantos envases,y de que tipo disponemos, asi como de cuanta capacidad?\n"))
        precio=(float(input("Cual es su precio\n")))
        stock=int(input("Cuantos tenemos en stock de ese producto?\n"))
        idproducto=int(input("Dime la ID del producto que quieres modificar: \n"))


        consulta=(f"update producto set nombre = %s, idcategoria= %s, medida= %s, precio= %s, stock= %s where idproducto = %s")

        cursor.execute(consulta,(nombre,idcategoria, medida, precio, stock, idproducto))

        conexion.commit()

        print(f"El producto de id {idproducto} fue modificada al nombre {nombre} de ID de categoria : {idcategoria}, de medida: {medida}, que cuesta {precio}, y del cual tenemos {stock} unidades")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

    
def delete_producto(conexion,cursor):
    try:
        idproducto=int(input("Dime el id del producto que deseas eliminar"))
        
        consulta=(f"delete from producto where idproducto= %s")

        cursor.execute(consulta,(idproducto,))

        conexion.commit()

        print(f"El producto con el id {idproducto} ha sido eliminada")
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    