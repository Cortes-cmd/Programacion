
def insert_producto (conexion,cursor):
    try:
        idproducto=int(input("Dime la ID del nuevo producto: \n"))
        nombre= input("Ingrese el nombre del nuevo producto: \n")
        idcategoria=int(input("De que idcategoria forma parte?\n Categorias:\n 1.Bebidas\n 2.Condimentos\n 3.Reposteria\n 4.Lacteos\n 5. Granos/Cereales\n 6.Carnes Magras\n 7.Frutas/Verduras\n 8.Pescado/Marisco\n"))
        medida=(input("Cuantos envases,y de que tipo disponemos, asi como de cuanta capacidad?\n"))
        precio=(float(input("Cual es su precio\n")))
        stock=int(input("Cuantos tenemos en stock de ese producto?\n"))


        consulta="insert into producto(idproducto,nombre,idcategoria,medida,precio,stock) values(%s,%s,%s,%s,%s,%s)"
        
        cursor.execute(consulta,(idproducto,nombre,idcategoria,medida,precio,stock))

        conexion.commit()

        print(f"Se insertó el producto: {nombre} con el ID de producto: {idproducto}, de ID de categoria : {idcategoria}, de medida: {medida}, que cuesta {precio}, y del cual tenemos {stock} unidades")


    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

def select_producto (cursor):
    try:
        consulta="select * from producto order by idproducto"

        print("Procesando consulta")

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
    