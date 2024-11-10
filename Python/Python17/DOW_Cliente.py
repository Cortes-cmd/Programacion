
def insert_cliente (conexion,cursor):
    try:
        idcliente=(input("Dime la ID del nuevo cliente: "))
        cia=input("Ingrese el nombre del nuevo cliente: ")
        contacto=(input("Dime el nombre de contacto del nuevo cliente: "))
        cargo=(input("Dime el cargo que ocupa el nuevo cliente: "))
        direccion=(input("Dime la direccion del nuevo cliente: "))
        ciudad=(input("Dime la ciudad del nuevo cliente: "))
        region=(input("Dime la region del nuevo cliente: "))
        cp=int(input("Dime el Codigo Postal del nuevo cliente: "))
        pais=(input("Dime el pais del nuevo cliente: "))
        tlf=(input("Dime el telefono del nuevo cliente: "))
        fax=(input("Dime el fax del nuevo cliente: "))

        consulta="insert into cliente(idcliente,cia,contacto,cargo,direccion,ciudad,region,cp,pais,tlf,fax) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"

        cursor.execute(consulta,(idcliente,cia,contacto,cargo,direccion,ciudad,region,cp,pais,tlf,fax))

        conexion.commit()

        print(f"Se insertó el cliente: {cia}\n con el ID de producto: {idcliente}\n con el nombre de contacto : {contacto}\n de cargo: {cargo}\n con la direccion: {direccion}\n la ciudad: {ciudad}\n la region: {region}\n el codigo postal: {cp}\n que vive en el pais {pais}\n con el telefono: {tlf}\n y con el fax {fax} :")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

def select_cliente (cursor):
    try:
        consulta="select * from cliente order by idcliente"

        cursor.execute(consulta)

        resultado=cursor.fetchall()
        for fila in resultado:
             print(f"IDCliente: {fila[0]}, cia: {fila[1]}, contacto: {fila[2]}, cargo: {fila[3]}, direccion: {fila[4]}, ciudad: {fila[5]}, region: {fila[6]}, codigo postal: {fila[7]}, pais: {fila[8]}, tlf: {fila[9]}, fax: {fila[10]}")

       

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")


def modify_cliente (conexion,cursor):
    try:
        cia=input("Ingrese el nombre del nuevo cliente: ")
        contacto=(input("Dime el nombre de contacto del nuevo cliente: "))
        cargo=(input("Dime el cargo que ocupa el nuevo cliente: "))
        direccion=(input("Dime la direccion del nuevo cliente: "))
        ciudad=(input("Dime la ciudad del nuevo cliente: "))
        region=(input("Dime la region del nuevo cliente: "))
        cp=int(input("Dime el Codigo Postal del nuevo cliente: "))
        pais=(input("Dime el pais del nuevo cliente: "))
        tlf=(input("Dime el telefono del nuevo cliente: "))
        fax=(input("Dime el fax del nuevo cliente: "))
        idcliente=(input("Dime la ID del cliente a cambiar: "))

        consulta=(f"update cliente set cia = %s, contacto= %s, cargo= %s, direccion= %s, ciudad= %s, region= %s, cp= %s, pais= %s, tlf= %s, fax= %s where idcliente = %s")

        cursor.execute(consulta,(cia,contacto,cargo,direccion,ciudad,region,cp,pais,tlf,fax,idcliente))

        conexion.commit()

        print(f"El cliente de id {idcliente} fue modificado al nombre: {cia}\n de contacto : {contacto}\n de cargo: {cargo}\n que vive en la direccion {direccion}\n en la ciudad {ciudad}\nen la region {region}\n de codigo postal {cp}\nen el pais {pais}\n con el telefono {tlf}\n y con el fax {fax}")

    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")

    
def delete_cliente(conexion,cursor):
    try:
        idcliente=(input("Dime el id del cliente que deseas eliminar"))
        
        consulta=(f"delete from cliente where idcliente= %s;")
        cursor.execute(consulta,(idcliente,))


        
        

        conexion.commit()

        print(f"El cliente con el id {idcliente} ha sido eliminado")
    except ValueError as e:
        print(f"Tipo de dato incorrecto, error {e}")
    except Exception as unkown:
        print(f"No pudo ejecutarse la funcion, error {unkown}")
    