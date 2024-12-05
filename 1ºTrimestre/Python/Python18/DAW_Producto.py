#DEF INSERTAR PRODUCTO
def insert_producto (conexion,cursor):
    try:
        #PIDO DATOS
        idproducto=int(input("Dime la ID del nuevo producto: \n"))
        nombre= input("Ingrese el nombre del nuevo producto: \n")
        idcategoria=int(input("De que idcategoria forma parte?\n Categorias:\n 1.Bebidas\n 2.Condimentos\n 3.Reposteria\n 4.Lacteos\n 5. Granos/Cereales\n 6.Carnes Magras\n 7.Frutas/Verduras\n 8.Pescado/Marisco\n"))
        medida=(input("Cuantos envases,y de que tipo disponemos, asi como de cuanta capacidad?\n"))
        precio=(float(input("Cual es su precio\n")))
        stock=int(input("Cuantos tenemos en stock de ese producto?\n"))

        #EJECUTO CONSULTA SQL
        consulta="insert into producto(idproducto,nombre,idcategoria,medida,precio,stock) values(%s,%s,%s,%s,%s,%s)"
        
        cursor.execute(consulta,(idproducto,nombre,idcategoria,medida,precio,stock))

        conexion.commit()

        print(f"Se insertó el producto: {nombre} con el ID de producto: {idproducto}, de ID de categoria : {idcategoria}, de medida: {medida}, que cuesta {precio}, y del cual tenemos {stock} unidades")


    #PREVEO ERRORES DATA TYPE ERROR Y OTROS
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF SELECCIONAR PRODUCTO
def select_producto (cursor):
    try:
        #CONSULTA VIA SQL Y EJECUTO
        consulta="select * from producto order by idproducto"

        print("Procesando consulta")

        cursor.execute(consulta)

        #MUESTRO EL PROCESO DE CURSOR EN UNA VARIABLE,Y LO MUESTRO POR MEDIO DE UN PRINT CON ESPECIFICACIONES POR FILAS
        resultado=cursor.fetchall()
        for fila in resultado:
            print(f"IDProducto: {fila[0]}, Nombre: {fila[1]}, IDCategoria: {fila[2]}, Medida: {fila[3]}, Precio: {fila[4]}, Stock: {fila[5]}")

       
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF MODIFICAR PRODUCTO
def modify_producto (conexion,cursor):
    try:
        #PIDO DATOS
        nombre= input("Que nombre quiere asignarle al producto?: \n")
        idcategoria=int(input("De que idcategoria forma parte?\n Categorias:\n 1.Bebidas\n 2.Condimentos\n 3.Reposteria\n 4.Lacteos\n 5. Granos/Cereales\n 6.Carnes Magras\n 7.Frutas/Verduras\n 8.Pescado/Marisco"))
        medida=(input("Cuantos envases,y de que tipo disponemos, asi como de cuanta capacidad?\n"))
        precio=(float(input("Cual es su precio\n")))
        stock=int(input("Cuantos tenemos en stock de ese producto?\n"))
        idproducto=int(input("Dime la ID del producto que quieres modificar: \n"))

        #CONSULTA SQL Y EJECUTO
        consulta=(f"update producto set nombre = %s, idcategoria= %s, medida= %s, precio= %s, stock= %s where idproducto = %s")

        cursor.execute(consulta,(nombre,idcategoria, medida, precio, stock, idproducto))

        conexion.commit()
        #PRINTEO UN AVISO DE ADICIÓN
        print(f"El producto de id {idproducto} fue modificada al nombre {nombre} de ID de categoria : {idcategoria}, de medida: {medida}, que cuesta {precio}, y del cual tenemos {stock} unidades")
    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

#DEF ELIMINAR PRODUCTO
def delete_producto(conexion,cursor):
    try:
        #PIDO DATOS
        idproducto=int(input("Dime el id del producto que deseas eliminar"))

        #CONSULTA SQL Y EJECUTO
        consulta=(f"delete from producto where idproducto= %s")

        cursor.execute(consulta,(idproducto,))

        conexion.commit()
        #PRINTEO EL ID QUE SE HA ELIMINADO
        print(f"El producto con el id {idproducto} ha sido eliminada")

    #ERRORES
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    