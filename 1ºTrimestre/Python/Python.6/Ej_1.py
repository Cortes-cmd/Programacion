productos = []

def añadir_producto ():
      while True:
         nproducto= input("Añade un producto \n")
         perecedero=input("Es perecedero? si/no\n")
         
         if perecedero.lower() == "si":
             producto_perecedero={
             "Nombre":nproducto,
             "Perecedero": True
             }
             productos.append(producto_perecedero)
      
         elif perecedero.lower()== "no":
             producto_inperecedero={
             "Nombre":nproducto,
             "Perecedero": False
             }
             productos.append(producto_inperecedero)
         Detener=input("Quieres detener la inclusion de productos a la lista? si/no \n")
         if Detener.lower()=="si":
            break




def Es_Perecedero(producto):
    return producto["Perecedero"]

añadir_producto()
perecederos=list(filter(Es_Perecedero,productos))

print(f"Los nombres de los productos perecederos son;\n")

for producto in perecederos:
    print(producto["Nombre"],"\n")